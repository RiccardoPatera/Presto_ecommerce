<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevisorController extends Controller
{
 





















    public function becomeRevisor (){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirct()->back()->with('message', 'Complimenti! Hai richiesto di diventare revisore correttamente');
    }
    public function makeRevisor (User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message','Complimenti!L\'utente è diventato un revisore');
    }
}
