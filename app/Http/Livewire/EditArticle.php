<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class EditArticle extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $body;
    public $category;
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
        'images.*'=> 'required|image|max:3072',
        'temporary_images'=> 'required|image|max:3072',
    ];

    protected $messages = [
        'title..required'=> 'The title is required',
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

    public function mount(){
        $this -> title = $this -> article -> title;
        $this -> price = $this -> article -> price;
        $this -> body = $this -> article -> body;
        $this -> category = $this -> article -> category;

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function articleUpdate(){

        $this->validate();

        $this -> article -> update([
            'title' => $this -> title,
            'price' => $this -> price,
            'body' => $this -> body,
            'category'=>$this->category,
        ]);
        
        if(count($this->images)){
            foreach ($this->images as $image) {
                // $this->article->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName="articles/{$this->article->id}";
                $newImage=$this->article->images()->create(['path'=>$image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path,500,500));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        return redirect(route('user_dashboard'))->with('message','Article updated correctly');
    }

    public function updated($propertyName){
        $this->validatedOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.edit-article');
    }
}
