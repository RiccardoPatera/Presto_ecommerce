<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller

{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username'=>['required','username'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect();
        }
 
        return back()->withErrors([
            'email' => 'Email is required',
            'password'=> 'Password required',
            'username'=>'Username is required',
        ])->onlyInput('email');
    }

}
