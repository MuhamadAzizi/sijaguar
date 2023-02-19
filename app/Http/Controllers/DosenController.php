<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

use function PHPSTORM_META\map;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Dosen',
            'dosen' => Dosen::all()
        ];

        return view('dashboard.dosen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Dosen'
        ];

        return view('dashboard.dosen.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'kode_dosen.required' => 'Kode Dosen harus diisi',
            'nama_dosen.required' => 'Nama Dosen harus diisi',
            'no_telp.required' => 'No Telp harus diisi',
            'email.required' => 'Email harus diisi'
        ];

        $request->validate([
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'no_telp' => 'required',
            'email' => 'required'
        ], $messages);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success', 'Berhasil menambahkan dosen');
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
            'title' => 'Edit Dosen',
            'dosen' => Dosen::find($id)
        ];

        return view('dashboard.dosen.edit', $data);
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
        $messages = [
            'kode_dosen.required' => 'Kode Dosen harus diisi',
            'nama_dosen.required' => 'Nama Dosen harus diisi',
            'no_telp.required' => 'No Telp harus diisi',
            'email.required' => 'Email harus diisi'
        ];

        $request->validate([
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'no_telp' => 'required',
            'email' => 'required'
        ], $messages);

        Dosen::find($id)->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Berhasil mengubah data dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dosen::destroy($id);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}