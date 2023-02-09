<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penggunaan;
use App\Models\Ruangan;

class PenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Penggunaan',
            'ruangan' => Ruangan::all()
        ];

        // Pengaturan kondisi level untuk menampilkan data penggunaan
        if (Auth::user()->level == 'Admin') {
            $data['penggunaan'] = Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->get();
        } elseif (Auth::user()->level == 'User') {
            $data['penggunaan'] = Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->where('user_id', Auth::user()->id)
                ->get();
        }

        return view('dashboard/penggunaan/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Penggunaan',
            'ruangan' => Ruangan::join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('ruangan.*', 'jenis_ruangan.nama_jenis_ruangan')
                ->get()
        ];

        return view('dashboard/penggunaan/create', $data);
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
            'ruangan_id.required' => 'Ruangan harus diisi',
            'tanggal_penggunaan.required' => 'Tanggal Penggunaan harus diisi',
            'jam_masuk.required' => 'Jam Mulai harus diisi',
            'jam_keluar.required' => 'Jam Selesai harus diisi',
            'keterangan.required' => 'Keterangan harus diisi'
        ];

        $request->validate([
            'ruangan_id' => 'required',
            'tanggal_penggunaan' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'keterangan' => 'required'
        ], $messages);

        Penggunaan::create([
            'user_id' => Auth::user()->id,
            'ruangan_id' => $request->ruangan_id,
            'tanggal_penggunaan' => $request->tanggal_penggunaan,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('penggunaan.index')->with('success', 'Berhasil mengajukan penggunaan ruangan');
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
            'title' => 'Edit Penggunaan',
            'ruangan' => Ruangan::join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('ruangan.*', 'jenis_ruangan.nama_jenis_ruangan')
                ->get(),
            'penggunaan' => Penggunaan::find($id)
        ];

        return view('dashboard/penggunaan/edit', $data);
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
            'ruangan_id.required' => 'Ruangan harus diisi',
            'tanggal_penggunaan.required' => 'Tanggal Penggunaan harus diisi',
            'jam_masuk.required' => 'Jam Mulai harus diisi',
            'jam_keluar.required' => 'Jam Selesai harus diisi',
            'keterangan.required' => 'Keterangan harus diisi'
        ];

        $request->validate([
            'ruangan_id' => 'required',
            'tanggal_penggunaan' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'keterangan' => 'required'
        ], $messages);

        Penggunaan::find($id)->update([
            'ruangan_id' => $request->ruangan_id,
            'tanggal_penggunaan' => $request->tanggal_penggunaan,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('penggunaan.index')->with('success', 'Berhasil mengubah pengajuan penggunaan ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penggunaan::destroy($id);

        return redirect()->route('penggunaan.index')->with('success', 'Berhasil menghapus pengajuan penggunaan ruangan');
    }
}
