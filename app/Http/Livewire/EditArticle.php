<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EditArticle extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $body;
    public $category_id;
    public $images = [];
    public $temporary_images=[];
    public $article;
    public $validated;

    protected $rules = [
        'title' => 'required|min:5',
        'price' => 'required|doesnt_start_with:-',
        'body' => 'required|min:5',
        'category_id'=> 'required',
        // 'images'=> 'required',
        // 'images.*'=> 'required|image|max:3072',
        // 'temporary_images.*'=> 'required|image|max:3072',
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


    public function edit() {

        $this->validate();

        $this->article->update([
            'title' => $this -> title,
            'price' => $this -> price,
            'body' => $this -> body,
            'category_id'=>$this->category_id,
            'is_accepted'=>null,
            'tips'=>null,
        ]);


        return redirect(route('user_dashboard',['user'=> $this->article->user]))->with('message','Article updated correctly');
        // session()->flash('message','Article edited successfully. Wait for the revisor to accept it.');
        // $this->reset();
    }


    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function mount(){

        $this -> title = $this -> article -> title;
        $this -> price = $this -> article -> price;
        $this -> body = $this -> article -> body;
        $this -> category_id = $this -> article -> category->id;
    }



    public function render()
    {
        return view('livewire.edit-article', ['categories'=>Category::all()]);
    }
}
