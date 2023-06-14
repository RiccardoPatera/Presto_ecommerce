<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public $search;
    public $category;
    public $data;


    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','search']);


    }

    public function index()
    {
        $articles=Article::orderBy('created_at', 'DESC')->where('is_accepted',true)->paginate(12);
        return view('articles.items', compact('articles'));
    }

    public function search(Request $request){
        if($request->category==0){
            if ($request->search==null){
                $articles=Article::orderBy('created_at', 'DESC')->where('is_accepted', true)->paginate(12);
                return view('articles.items', compact('articles'), );
            }
            else{
            $articles=Article::search($request->search)->orderBy('created_at', 'DESC')->where('is_accepted', true)->paginate(12);
            return view('articles.items', compact('articles'));
        }

        }
        else{
            if ($request->search==null){
            $articles= Article::orderBy('created_at', 'DESC')->where('is_accepted', true)->where('category_id', $request->category)->paginate(12);
            return view('articles.items', compact('articles'));

        }
            else{
            $articles= Article::search($request->search)->orderBy('created_at', 'DESC')->where('is_accepted', true)->where('category_id', $request->category)->paginate(12);
            return view('articles.items', compact('articles'));

        }
        };

    }

    public function create()
    {
        return view ('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if ($article->is_accepted===0){
            if(Auth::id()==$article->user_id){
                return view('Articles.edit',compact('article'))->with('message','Your article need to be updated');
            }
            else{
                return redirect(route('items'))->with('message',"The request article doesn't exist");
            }
        }
        if ($article->is_accepted===null){
            if(Auth::id()==$article->user_id){
                return redirect(route('user_dashboard',['user'=>Auth::user()]))->with('message','Your article is under review, try later');
            }
            else{
                return redirect(route('items'))->with('message',"The request article doesn't exist");
            }
        }
        return view('Articles.detail', compact('article'));

    }



    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

}
