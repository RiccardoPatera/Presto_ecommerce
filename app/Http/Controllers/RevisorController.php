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

        $article=Article::all()->where('is_accepted', '===', null)->first();
        return view ('revisor.index',compact('article'));
    }

    public function dashboard(User $user)
    {
        return view ('revisor.dashboard',compact('user'));
    }

    // public function accept_article(Article $article){
    //     $article->setAccepted(true);
    //     return redirect(route('revisor_index'))->with('previous_article',$article)->with('accept',"You've accepted the article");
    // }


    // public function reject_Article(Article $article){
    //     $article->setAccepted(false);
    //     return redirect(route('revisor_index'))->with('previous_article',$article)->with('refuse',"You've refused the article");
    // }

    // public function restore_Article(Article $article){

    //     $article->setAccepted(null);
    //     return redirect(route('revisor_index',['article'=>$article]))->with('message',"Article Restored");
    // }

    public function become_revisor(){
        return view('revisor.form');
    }

    public function make_revisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message','The user is now a revisor');
    }
}
