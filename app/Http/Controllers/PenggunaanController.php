<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penggunaan;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Gate;

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
            'title' => 'Penggunaan'
        ];

        // Update penggunaan ruangan (naive approach)
        Penggunaan::where('tanggal_penggunaan', date('Y-m-d'))
            ->where('jam_keluar', '<', date('H:i:s'))
            ->where('status', 'Diterima')
            ->update(['status' => 'Selesai']);

        // Pengaturan kondisi level untuk menampilkan data penggunaan
        if (Gate::allows('isAdmin')) {
            $data['penggunaan'] = Penggunaan::all();
        } elseif (Gate::allows('isUser')) {
            $data['penggunaan'] = Penggunaan::where('user_id', Auth::user()->id)->get();
        }

        return view('dashboard.penggunaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('isUser')) {
            $data = [
                'title' => 'Tambah Penggunaan',
                'ruangan' => Ruangan::all()
            ];

            return view('dashboard.penggunaan.create', $data);
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
        if (Gate::allows('isUser')) {
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
        if (Gate::allows('isUser')) {
            $data = [
                'title' => 'Edit Penggunaan',
                'ruangan' => Ruangan::all(),
                'penggunaan' => Penggunaan::find($id)
            ];

            return view('dashboard.penggunaan.edit', $data);
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
            Penggunaan::find($id)->update([
                'status' => $request->status
            ]);

            $msg = 'Berhasil ' . $request->status . ' penggunaan ruangan';
        } elseif (Gate::allows('isUser')) {
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

            $msg = 'Berhasil mengubah pengajuan penggunaan ruangan';
        }

        return redirect()->route('penggunaan.index')->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('isUser')) {
            Penggunaan::destroy($id);

            return redirect()->route('penggunaan.index')->with('success', 'Berhasil menghapus pengajuan penggunaan ruangan');
        } else {
            abort(403);
        }
    }
}