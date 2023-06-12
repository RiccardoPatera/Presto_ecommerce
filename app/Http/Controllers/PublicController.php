<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class PublicController extends Controller
{
    public function welcome() {
        $articles_all=Article::all();
        $articles_all=Article::orderBy('created_at', 'DESC')->where('is_accepted',true)->get();
        return view('welcome', ['articles'=>$articles_all]);
    }

<<<<<<< HEAD
    public function searchArticles(Request $request) {
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);
        

        return view('welcome', compact('articles'));
    }


=======
>>>>>>> 1b0bde523c2f5ce46057580a2be03d36205f98bf
}



