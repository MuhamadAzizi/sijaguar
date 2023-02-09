<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\TahunAkademik;
use App\Models\Ruangan;
use App\Models\MataKuliah;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Jadwal',
            'jadwal' => Jadwal::join('mata_kuliah', 'jadwal.mata_kuliah_id', '=', 'mata_kuliah.id')
                ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id')
                ->join('tahun_akademik', 'jadwal.tahun_akademik_id', '=', 'tahun_akademik.id')
                ->select('jadwal.*', 'mata_kuliah.*', 'ruangan.no_ruangan', 'tahun_akademik.tahun_akademik', 'tahun_akademik.status')
                ->get(),
            'tahun_akademik' => TahunAkademik::where('status', 'Aktif')->latest()->first()
        ];

        return view('dashboard/jadwal/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Jadwal',
            'tahun_akademik' => TahunAkademik::where('status', 'Aktif')->latest()->first(),
            'ruangan' => Ruangan::join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('ruangan.*', 'jenis_ruangan.nama_jenis_ruangan')
                ->get(),
            'mata_kuliah' => MataKuliah::all()
        ];

        return view('dashboard/jadwal/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
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
            'title' => 'Edit Jadwal',
            'jadwal' => Jadwal::find($id),
            'tahun_akademik' => TahunAkademik::where('status', 'Aktif')->latest()->first(),
            'ruangan' => Ruangan::join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('ruangan.*', 'jenis_ruangan.nama_jenis_ruangan')
                ->get(),
            'mata_kuliah' => MataKuliah::all()
        ];

        return view('dashboard/jadwal/edit', $data);
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
        Jadwal::find($id)->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
