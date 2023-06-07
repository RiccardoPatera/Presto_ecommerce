<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateForm extends Component
{
    public $title;
    public $price;
    public $body;
    public $category_id;

    protected $rules = [
        'title' => 'required|min:5',
        'price' => 'required|doesnt_start_with:-',
        'body' => 'required|min:5',
        'category_id'=> 'required',
    ];

    protected $messages = [
        'title.required'=> 'The title is required',
        'price.required'=> 'The price is required',
        'body.required'=> 'The description is required',
        'category_id.required'=> "The category is required",
    ];

   public function create(){
        $this->validate();

        Article::create([
        'title'=> $this->title,
        'price'=> $this->price,
        'body'=> $this->body,
        'category_id'=>$this->category_id,
        'user_id'=>Auth::id()


    ]);
    
    session()->flash('message','Articolo inserito correttamente');
    $this->reset();

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
