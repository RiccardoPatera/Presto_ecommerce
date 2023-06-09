<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome() {
        $articles_all=Article::all();
        $articles_all=Article::orderBy('created_at', 'DESC')->where('is_accepted',true)->get();
        return view('welcome', ['articles'=>$articles_all]);
    }

    public function searchArticles(Request $request) {
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('articles.items', compact('articles'));
    }


}
