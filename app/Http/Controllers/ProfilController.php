<?php

namespace App\Http\Controllers;

use App\Models\Penggunaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->firstOrFail();

        $data = [
            'title' => 'Profil',
            'user' => $user,
            'penggunaan' => Penggunaan::whereBelongsTo($user)->get(),
        ];

        return view('dashboard.profil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'title' => 'Edit Profil',
            'user' => User::where('id', $id)->firstOrFail(),
        ];

        return view('dashboard.profil.edit', $data);
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
        if ($request->password_baru == null) {
            $request->validate([
                'username' => 'required',
                'nama' => 'required',
            ]);

            $filename = null;
            if ($request->file('foto')) {
                $foto = $request->file('foto');
                $filename = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move('img/user/', $filename);
            } else {
                $filename = $request->foto_lama;
            }

            User::whereId($id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'foto' => $filename,
            ]);

            return redirect()->route('profil.index')->with('success', 'Profil berhasil di ubah');
        } else {
            if (!Hash::check($request->password_lama, Auth::user()->password)) {
                return redirect()->back()->with('error', 'Password lama tidak sesuai');
            } else {
                $request->validate([
                    'password_lama' => 'required',
                    'password_baru' => 'required|confirmed'
                ]);

                User::whereId($id)->update([
                    'password' => bcrypt($request->password_baru)
                ]);

                return redirect()->route('profil.index')->with('success', 'Password berhasil di ubah');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}