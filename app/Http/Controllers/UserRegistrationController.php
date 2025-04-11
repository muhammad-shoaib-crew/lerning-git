<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Foundation\Auth\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegistrationController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        // dd(request()->all());
        $validatedAttr = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password'=> ['required', 'confirmed']
        ]);

        // dd($validatedAttr);

        // Creating User
        // User::create([
        //     'name' => request('name'),
        //     'email' => request('email'),
        //     'password'=> Request('password')
        // ]);

        $user = User::create($validatedAttr);
        
        // Loggin to user

        Auth::login($user);

        // Redirect
        return redirect('/');
    }
    
}
