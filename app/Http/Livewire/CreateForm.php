<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Jobs\Watermark;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateForm extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $body;
    public $category_id;
    public $images = [];
    public $temporary_images;
    public $article;
    public $validated;

    protected $rules = [
        'title' => 'required|min:5',
        'price' => 'required|doesnt_start_with:-',
        'body' => 'required|min:5',
        'category_id'=> 'required',
        'images'=> 'required',
        'images.*'=> 'required|image|max:3072|mimes:jpeg, png, bmp',
        'temporary_images.*'=> 'required|image|max:3072|mimes:jpeg, png, bmp',
    ];

    protected $messages = [
        'title.required'=> 'The title is required',
        'price.required'=> 'The price is required',
        'body.required'=> 'The description is required',
        'category_id.required'=> "The category is required",

        'images.*.required'=> 'The image is required',
        'images.*.max'=> 'The file need to be max 3MB',
        'images.*.image'=> 'The file need to be a image',
        'images.required'=> 'The image is required',

        'temporary_images.*.required'=> 'The image is required',
        'temporary_images.*.max'=> 'The file need to be max 3MB',
        'temporary_images.*.image'=> 'The file need to be a image',
    ];

    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=>'image|max:3072',
        ])) {
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
        }
    }

   public function create(){
        $this->validate();

            $this->article = Article::create([
            'title'=> $this->title,
            'price'=> $this->price,
            'body'=> $this->body,
            'category_id'=>$this->category_id,
            'user_id'=>Auth::id(),
            ]);

            if(count($this->images)){
                foreach ($this->images as $image) {
                    // $this->article->images()->create(['path'=>$image->store('images', 'public')]);
                    $newFileName="articles/{$this->article->id}";
                    $newImage=$this->article->images()->create(['path'=>$image->store($newFileName, 'public')]);
                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path,500,500),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);
                }
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }

    session()->flash('message','Article created successfully. Wait for the revisor to accept it.');
    $this->reset();

    }



    public function removeImage($key){
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function updated($propertyName)
            {
                $this->validateOnly($propertyName);
            }


    public function render()
    {
        return view('livewire.create-form',['categories'=>Category::All()]);
    }
}
