<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function home()
    {
        return view('activities.home');
    }

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
            'password'=>'required|string|max:100|min:8',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
        ]);
        // Login 
        Auth::login($user);

        // Return
        return redirect( route('auth_login'));
    }
    
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        // Validation
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:100|min:8',
        ]);

        // Auth User
        $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->pass]);
        if (!$is_login)
        {
            return back();
        }
        return redirect( route('home'));
        // Return
        return redirect( route('auth_login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect( route('auth_login'));
    }
}
