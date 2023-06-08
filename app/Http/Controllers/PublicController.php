<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome() {
        $articles_all=Article::all();
        $articles_all=Article::orderBy('created_at', 'DESC')->where('is_accepted',true)->get();
        // $articles=$articles_all->where('is_accepted',true);
        // $articles = Article::take(6)->orderBy('created_at', 'DESC')->get();
        return view('welcome', ['articles'=>$articles_all]);
    }


}
