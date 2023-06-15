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
        return redirect(route('revisor_index'))->with('accepted',"You've accepted this article");

    }

    public function reject_article(){
        $this->validate();
        $this->article->update([
            'is_accepted'=>0,
            'tips'=>$this->tips,
            'revisored_by'=>Auth::id(),
        ]);

        $this->article=null;
        return redirect(route('revisor_index'))->with('rejected',"You've rejected this article");

    }



    public function render()
    {

        $this->user=Auth::user();

        return view('livewire.revisor-index',['article'=>$this->article]);
    }
}
