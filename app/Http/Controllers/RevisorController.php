<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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


    public function become_revisor(){
        return view('revisor.form');
    }

    public function make_revisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message','The user is now a revisor');


    }
}
