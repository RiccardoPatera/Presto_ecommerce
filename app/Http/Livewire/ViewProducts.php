<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class ViewProducts extends Component
{

    public $articles;
    public $category;



    public function filterByCategory(){
        if($this->category==0){
            $this->articles=Article::orderBy('created_at', 'DESC')->get();
        }
        else{
            $this->articles=Article::where('category_id', $this->category)->get();
        }

    }


    public function render()
    {

        return view('livewire.view-products',['categories'=>Category::all()]);
    }
}
