<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        // Validation
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'pass'=>'required|string|max:100|min:8',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'pass' => Hash::make($request->pass),
        ]);
        // Login 
        Auth::login($user);

        // Return
        return redirect( route('home'));
    }

    public function home()
    {
        $user = User::get();
        return view('activities.home',compact('user'));
    }
}
