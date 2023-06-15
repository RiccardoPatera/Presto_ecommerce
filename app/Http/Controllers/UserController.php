<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function __construct(){
    $this->middleware('auth');
    }

    public function user_dashboard(User $user){

        if($user->is_revisor==1){
            return redirect(route('revisor_dashboard',compact('user')));
        }
        return view('user.dashboard', compact('user'));
    }

}
