<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateForm extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $body;
    public $category_id;
    public $img;
    public $images = [];
    public $temporary_images;
    public $article;

    protected $rules = [
        'title' => 'required|min:5',
        'price' => 'required|doesnt_start_with:-',
        'body' => 'required|min:5',
        'category_id'=> 'required',
        'images.*'=> 'image|required|max:3072',
        'temporary_images.*'=> 'image|required|max:3072',
    ];

    protected $messages = [
        'title.required'=> 'The title is required',
        'price.required'=> 'The price is required',
        'body.required'=> 'The description is required',
        'category_id.required'=> "The category is required",
        // 'img.required'=> "The images is required",
    ];

   public function create(){
        $this->validate();

            $this -> article = Article::create([
            'title'=> $this->title,
            'price'=> $this->price,
            'body'=> $this->body,
            'category_id'=>$this->category_id,
            'user_id'=>Auth::id(),
            ]);

            if(count($this->images)){
                foreach ($this->images as $image) {
                    $this->article->images()->create(['path'=>$image->store('images', 'public')]);
                }
            }

    session()->flash('message','Article created successfully');
    $this->reset();

    }

    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=>"image|max:3072",
        ])) {
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
        }
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
