<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Login berhasil!');
        }

        // Jangan redirect ke route('login'), gunakan back()
        return back()->with('error', 'Email atau password salah.');
    }
}
