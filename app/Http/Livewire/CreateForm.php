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
    dd($this->title);
    $article = Article::create([
        'title'=> $this->title,
        'price'=> $this->price,
        'body'=> $this->body,
    ]);

   }



    public function render()
    {
        return view('livewire.create-form');
    }
}
