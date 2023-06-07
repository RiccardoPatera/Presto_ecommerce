<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ViewProducts extends Component
{

    public $articles;




    public function render()
    {
        return view('livewire.view-products',['categories'=>Category::all()]);
    }
}
