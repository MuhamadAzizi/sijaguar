<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\JenisRuangan;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::allows('isAdmin')) {
            $data = [
                'title' => 'Tambah Ruangan',
                'jenis_ruangan' => JenisRuangan::all()
            ];

            return view('dashboard.ruangan.create', $data);
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')) {
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
        } else {
            abort(403);
        }
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
        if (Gate::allows('isAdmin')) {
            $data = [
                'title' => 'Edit Ruangan',
                'ruangan' => Ruangan::findOrFail($id),
                'jenis_ruangan' => JenisRuangan::all()
            ];

            return view('dashboard.ruangan.edit', $data);
        } else {
            abort(403);
        }
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
        if (Gate::allows('isAdmin')) {
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
        } else {
            abort(403);
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
        if (Gate::allows('isAdmin')) {
            Ruangan::destroy($id);

            return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus');
        } else {
            abort(403);
        }
    }
}