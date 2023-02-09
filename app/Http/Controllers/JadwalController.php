<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\TahunAkademik;

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
            'tahun_akademik' => TahunAkademik::where('status', 'Aktif')->get(),
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
        //
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
        //
    }
}
