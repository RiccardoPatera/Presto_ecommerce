<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SearchBar extends Component
{

    public $category;
    public $search;
    public $data;


    public function searched(Request $request){

        request()->session()->reflash('search', $this->search);
        request()->session()->reflash('category', $this->category);




    }

    public function mount(){

        $this->search=session('search');
        $this->category=session('category');

    }
    public function render()
    {


        return view('livewire.search-bar', ['categories'=>Category::all()] );


    }
}
