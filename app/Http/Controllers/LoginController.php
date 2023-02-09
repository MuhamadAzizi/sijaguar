<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.'
        ];

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }

        return back()->withErrors([
            'error' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
