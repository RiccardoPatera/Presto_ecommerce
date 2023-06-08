<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted',null)->first();
        return view ('revisor.index', ['article'=>$article_to_check]);
    }

    public function accept_article(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('message',"You've accepted the article");
    }


    public function reject_Article(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('message',"You've rejected the article");

    }
    
    public function becomeRevisor (){
        Mail::to ('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect ()->back()->with('message', 'Complimenti! Hai richiesto di diventare revisore correttamente');
    }

    public function makeRevisor (User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=> $user->email]);
        return redirect ('/')->with('message', 'Complimenti! L\'utente è diventato un revisore');
    }

}
