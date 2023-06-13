<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class SearchCollaps extends Component
{
    public $category;

    public function render()
    {
        return view('livewire.search-collaps', ['categories'=>Category::all()]);
    }
}
