<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class DashboardRevisor extends Component
{

    public $user;
    public $articles;



    public function review(Article $article) {
        $article->update([
            'is_accepted'=>null,
            'revisored_by'=>null,
            'tips'=>null,
        ]);

        return redirect(route('revisor_index',compact('article')))->with('restored','Article Restored');

    }
    public function render()

    {

        $this->articles=Article::all()->where('revisored_by',$this->user->id);
        return view('livewire.dashboard-revisor');
    }
}
