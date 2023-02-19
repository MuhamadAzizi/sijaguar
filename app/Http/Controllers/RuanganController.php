<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\JenisRuangan;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Ruangan',
            'ruangan' => Ruangan::all(),
            'jenis_ruangan' => JenisRuangan::all()
        ];

        return view('dashboard.ruangan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Ruangan',
            'jenis_ruangan' => JenisRuangan::all()
        ];

        return view('dashboard.ruangan.create', $data);
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
            'no_ruangan.required' => 'No Ruangan harus diisi',
            'jenis_ruangan_id.required' => 'Jenis Ruangan harus diisi'
        ];

        $request->validate([
            'no_ruangan' => 'required',
            'jenis_ruangan_id' => 'required'
        ], $messages);

        Ruangan::create($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan');
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
            'title' => 'Edit Ruangan',
            'ruangan' => Ruangan::findOrFail($id),
            'jenis_ruangan' => JenisRuangan::all()
        ];

        return view('dashboard.ruangan.edit', $data);
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
            'no_ruangan.required' => 'No Ruangan harus diisi',
            'jenis_ruangan_id.required' => 'Jenis Ruangan harus diisi'
        ];

        $request->validate([
            'no_ruangan' => 'required',
            'jenis_ruangan_id' => 'required'
        ], $messages);

        Ruangan::findOrFail($id)->update($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ruangan::destroy($id);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus');
    }
}
