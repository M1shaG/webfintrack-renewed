<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
            'email' => 'required|email|min:2|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            
        ]);

        $user = User::create($valid_data); 

        Auth::login($user);

        return redirect()->route('profile');
    }

    public function login(Request $request)
    {
        $valid_data = $request->validate([
            'email' => 'required|email|min:2|max:255',
            'password' => 'required|string|min:1|max:1000', 
        ]);

        if(Auth::attempt($valid_data)) {
            $request->session()->regenerate();

            return redirect()->route('profile');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Sorry, incorect credentials'
        ]); 
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    } 
}
