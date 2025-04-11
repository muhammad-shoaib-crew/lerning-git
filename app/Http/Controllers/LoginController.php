<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        // dd(request()->all());
        $validatedAttr = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt to login
        Auth::attempt($validatedAttr);

        // Regenrate toke
        request()->session()->regenerate();
        

        return redirect('/');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
