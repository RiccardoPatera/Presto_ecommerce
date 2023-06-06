<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class CreateForm extends Component
{
    public $title;
    public $price;
    public $body;

   public function articleStore(){
    // $this->validate();
    
    $article = Article::create([
        'title'=> $this->title,
        'price'=> $this->price,
        'body'=> $this->body,
    ]);
dd($this->title);
   }



    public function render()
    {
        return view('livewire.create-form');
    }
}
