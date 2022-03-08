<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('layouts.auth.index');
    }

    public function auth(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'alpha_dash',],
            'password' => ['required']
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return redirect('/login')->with('failed', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Log out Berhasil');
    }
}
