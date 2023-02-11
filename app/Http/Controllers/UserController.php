<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Penggunaan;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => User::where('level', 'User')->get()
        ];

        return view('dashboard/user/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah User'
        ];

        return view('dashboard/user/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required',
        ]);

        $filename = null;
        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move('img/user/', $filename);
        } else {
            $foto = null;
        }

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'level' => 'User',
            'foto' => $filename
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title' => 'Detail User',
            'user' => User::find($id),
            'penggunaan' => Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->where('user_id', $id)
                ->get()
        ];

        return view('dashboard/user/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => User::find($id)
        ];

        return view('dashboard/user/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
