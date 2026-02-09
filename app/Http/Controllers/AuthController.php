<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegistration()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function registration(Request $request)
    {
        $valid_data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|min:2|unique:users',
            'password' => 'required|string|min:8|confirmed',
            
        ]);

        $user = User::create($valid_data); 

        Auth::login($user);

        return redirect()->route('index');
    }

    public function login()
    {
        return view('auth.login');
    }
}
