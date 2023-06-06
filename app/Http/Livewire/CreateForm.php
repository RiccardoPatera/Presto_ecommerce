<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class CreateForm extends Component
{
    public $title;
    public $price;
    public $body;

   public function create(){
    // $this->validate();
<<<<<<< HEAD
    
    $article = Article::create([
=======
    Article::create([
>>>>>>> 2ec8e3834996e4a4be1fa0eacc960e87af9ec688
        'title'=> $this->title,
        'price'=> $this->price,
        'body'=> $this->body,
    ]);
<<<<<<< HEAD
dd($this->title);
=======

    $this->reset();

>>>>>>> 2ec8e3834996e4a4be1fa0eacc960e87af9ec688
   }



    public function render()
    {
        return view('livewire.create-form');
    }
}
