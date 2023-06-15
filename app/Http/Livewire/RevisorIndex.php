<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RevisorIndex extends Component
{


    public $article;
    public $articles;
    public $tips;
    public $user;

    protected $rules=[
        'tips'=>'required|min:10',
    ];

    protected $message=[
        'tips.required'=>'You need to help user to fix this product',
        'tips.min'=>'Explain why this product is not suitable'

    ];

    public function accept_article(){
        $this->article->update([
            'is_accepted'=>1,
            'revisored_by'=>Auth::id(),
            'tips'=>null,
        ]);

        $this->article=null;
        session()->flash('rejected',"You've rejected this article");
        redirect()->back();



    }

    public function reject_article(){
        $this->validate();
        $this->article->update([
            'is_accepted'=>0,
            'tips'=>$this->tips,
            'revisored_by'=>Auth::id(),
        ]);

        $this->article=null;

        session()->flash('rejected',"You've rejected this article");
        redirect()->back();



    }

    public function render()
    {

        $this->article=Article::where('is_accepted',null)->first();
        $this->user=Auth::user();

        return view('livewire.revisor-index');
    }
}
