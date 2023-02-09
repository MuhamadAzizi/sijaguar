<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\VerifikasiJadwal;

class VerifikasiJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Verifikasi Jadwal',
            'verifikasi_jadwal' => VerifikasiJadwal::join('jadwal', 'verifikasi_jadwal.jadwal_id', '=', 'jadwal.id')
                ->join('mata_kuliah', 'jadwal.mata_kuliah_id', '=', 'mata_kuliah.id')
                ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id')
                ->select('verifikasi_jadwal.*', 'mata_kuliah.kode_mk', 'mata_kuliah.nama_mk', 'mata_kuliah.sks', 'mata_kuliah.t_p', 'mata_kuliah.kelas', 'jadwal.hari', 'jadwal.jam_mulai', 'jadwal.jam_selesai', 'ruangan.no_ruangan')
                ->get()
        ];

        return view('dashboard/verifikasi_jadwal/index', $data);
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
        $hari = date('l');
        switch ($hari) {
            case 'Monday':
                $hari = 'Senin';
                break;
            case 'Tuesday':
                $hari = 'Selasa';
                break;
            case 'Wednesday':
                $hari = 'Rabu';
                break;
            case 'Thursday':
                $hari = 'Kamis';
                break;
            case 'Friday':
                $hari = 'Jumat';
                break;
            case 'Saturday':
                $hari = 'Sabtu';
                break;
            case 'Sunday':
                $hari = 'Minggu';
                break;
        }

        $jadwal = Jadwal::where('hari', $hari)->get();
        foreach ($jadwal as $row) {
            VerifikasiJadwal::create([
                'jadwal_id' => $row->id,
                'status' => 'Menunggu'
            ]);
        }

        return redirect()->route('verifikasi-jadwal.index')->with('success', 'Berhasil menambahkan data');
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
    public function update($id)
    {
        $verfifikasi_jadwal = VerifikasiJadwal::find($id);
        $verfifikasi_jadwal->status = 'Hadir';
        $verfifikasi_jadwal->save();

        return redirect()->route('verifikasi-jadwal.index')->with('success', 'Berhasil memverifikasi jadwal');
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
