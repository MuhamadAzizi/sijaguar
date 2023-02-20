<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'unique' => 'Username sudah digunakan.',
            'confirmed' => 'Konfirmasi password tidak sesuai.',
        ];

        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
        ], $messages);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => 'User',
        ]);

        return redirect()->route('login.index')->with('success', 'Pendaftaran berhasil. Silahkan login.');
    }
}
