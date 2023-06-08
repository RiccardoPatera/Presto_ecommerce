<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class ViewProducts extends Component
{

    public $articles;
    public $category;
    public $noproduct;


    public function filterByCategory(){
        if($this->category==0){
            $this->articles=Article::orderBy('created_at', 'DESC')->where('is_accepted',true)->get();
        }
        else{
            $this->articles=Article::where('category_id', $this->category)->where('is_accepted', true)->get();
        };
        // if($this->articles==[]){
        //     session()->flash('message','Nessun Prodotto trovato');
        // }


    }


    public function render()
    {


        return view('livewire.view-products',['categories'=>Category::all()]);
    }
}
