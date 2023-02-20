<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penggunaan;

class LoginController extends Controller
{
    public function index()
    {
        // Check if logged in
        if (Auth::check()) {
            return redirect()->route('index');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        // Check if logged in
        if (Auth::check()) {
            return redirect()->route('index');
        }

        $messages = [
            'required' => 'Kolom :attribute harus diisi.'
        ];

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Update penggunaan ruangan (naive approach)
            Penggunaan::where('tanggal_penggunaan', date('Y-m-d'))
                ->where('jam_keluar', '<', date('H:i:s'))
                ->where('status', 'Diterima')
                ->update(['status' => 'Selesai']);

            return redirect()->route('index');
        }

        return back()->withErrors([
            'error' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        if (!Auth::check()) {
            abort(403);
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}