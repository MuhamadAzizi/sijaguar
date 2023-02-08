<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisRuangan;

class JenisRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Jenis Ruangan'
        ];

        return view('dashboard/jenis_ruangan/create', $data);
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
            'nama_jenis_ruangan.required' => 'Nama Jenis Ruangan harus diisi'
        ];

        $request->validate([
            'nama_jenis_ruangan' => 'required'
        ], $messages);

        JenisRuangan::create($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Jenis Ruangan berhasil ditambahkan');
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
            'title' => 'Edit Jenis Ruangan',
            'jenis_ruangan' => JenisRuangan::find($id)
        ];

        return view('dashboard/jenis_ruangan/edit', $data);
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
            'nama_jenis_ruangan.required' => 'Nama Jenis Ruangan harus diisi'
        ];

        $request->validate([
            'nama_jenis_ruangan' => 'required'
        ], $messages);

        JenisRuangan::find($id)->update($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Jenis Ruangan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisRuangan::destroy($id);

        return redirect()->route('ruangan.index')->with('success', 'Jenis Ruangan berhasil dihapus');
    }
}
