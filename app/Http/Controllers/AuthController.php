<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('index');  // Assurez-vous que cette route existe
        }

        return redirect()->back()->withErrors('Les identifiants ne correspondent pas.');
    }

    public function logout()
    {
        Auth()->logout();
        return redirect()->route('login');  // Assurez-vous que cette route existe
    }
}
