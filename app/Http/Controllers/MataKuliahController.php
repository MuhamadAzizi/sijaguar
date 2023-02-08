<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Mata Kuliah',
            'mata_kuliah' => MataKuliah::all()
        ];

        return view('dashboard/mata_kuliah/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Mata Kuliah'
        ];

        return view('dashboard/mata_kuliah/create', $data);
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
            'kode_mk.required' => 'Kode Mata Kuliah harus diisi',
            'kode_mk.size' => 'Kode Mata Kuliah harus 8 karakter',
            'nama_mk.required' => 'Nama Mata Kuliah harus diisi',
            'sks.required' => 'SKS harus diisi',
            'sks.min_digits' => 'SKS minimal 1 sks',
            't_p.required' => 'Teori / Praktek harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'kelas.size' => 'Kelas harus 2 karakter',
            'semester.required' => 'Semester harus diisi',
            'semester.min_digits' => 'Semester minimal 1 semester'
        ];

        $request->validate([
            'kode_mk' => 'required|size:8',
            'nama_mk' => 'required',
            'sks' => 'required|min_digits:1',
            't_p' => 'required',
            'kelas' => 'required|min:2|max:2',
            'semester' => 'required|min_digits:1'
        ], $messages);

        MataKuliah::create($request->all());

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Mata Kuliah berhasil ditambahkan');
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
            'title' => 'Edit Mata Kuliah',
            'mata_kuliah' => MataKuliah::find($id)
        ];

        return view('dashboard/mata_kuliah/edit', $data);
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
            'kode_mk.required' => 'Kode Mata Kuliah harus diisi',
            'kode_mk.size' => 'Kode Mata Kuliah harus 8 karakter',
            'nama_mk.required' => 'Nama Mata Kuliah harus diisi',
            'sks.required' => 'SKS harus diisi',
            'sks.min_digits' => 'SKS minimal 1 sks',
            't_p.required' => 'Teori / Praktek harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'kelas.size' => 'Kelas harus 2 karakter',
            'semester.required' => 'Semester harus diisi',
            'semester.min_digits' => 'Semester minimal 1 semester'
        ];

        $request->validate([
            'kode_mk' => 'required|size:8',
            'nama_mk' => 'required',
            'sks' => 'required|min_digits:1',
            't_p' => 'required',
            'kelas' => 'required|min:2|max:2',
            'semester' => 'required|min_digits:1'
        ], $messages);

        MataKuliah::find($id)->update($request->all());

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Mata Kuliah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MataKuliah::destroy($id);

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Mata Kuliah berhasil dihapus');
    }
}
