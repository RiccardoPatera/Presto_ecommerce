<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{

    public function welcome() {
        $articles_all=Article::all();
        $articles_all=Article::orderBy('created_at', 'DESC')->where('is_accepted',true)->get();
        return view('welcome', ['articles'=>$articles_all]);
    }
    public function setLanguage($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }


    public function users_articles(User $user){
        //  if($user->id != Auth::id()){
            return view('profile',compact('user'));
//     }
//         else{
//             return redirect(route('user_dashboard',['user'=>Auth::user()]));

// }

}

}
