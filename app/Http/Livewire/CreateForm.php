<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateForm extends Component
{
    public $title;
    public $price;
    public $body;
    public $category_id;

   public function create(){
    // $this->validate();
    $category=Category::find($this->category_id);
    $category->articles()->create([
        'title'=> $this->title,
        'price'=> $this->price,
        'body'=> $this->body,
        'user_id' => Auth::id(),
    ]);



    $this->reset();
    session()->flash('message','Articolo inserito correttamente');

   }



    public function render()
    {
        return view('livewire.create-form',['categories'=>Category::All()]);
    }
}
