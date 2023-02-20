<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\JadwalUser;
use App\Models\TahunAkademik;
use App\Models\Ruangan;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
            'tahun_akademik' => TahunAkademik::where('status', 'Aktif')->latest()->first()
        ];

        // Pengaturan kondisi level untuk menampilkan data jadwal
        if (Gate::allows('isAdmin')) {
            $data['jadwal'] = Jadwal::whereBelongsTo($data['tahun_akademik'])->get();
        } elseif (Gate::allows('isUser')) {
            $data['jadwal'] = User::find(Auth::user()->id)->jadwal()->whereBelongsTo($data['tahun_akademik'])->get();
        }

        return view('dashboard.jadwal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahun_akademik = TahunAkademik::where('status', 'Aktif')->latest()->first();

        $data = [
            'title' => 'Tambah Jadwal',
            'tahun_akademik' => $tahun_akademik,
            'ruangan' => Ruangan::all(),
            'mata_kuliah' => MataKuliah::all(),
            'jadwal' => Jadwal::whereBelongsTo($tahun_akademik)->get(),
        ];

        return view('dashboard.jadwal.create', $data);
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
                'kelas.required' => 'Kelas wajib diisi',
            ];

            $request->validate([
                'kelas' => 'required'
            ], $messages);

            Jadwal::create($request->all());
        } elseif (Gate::allows('isUser')) {
            JadwalUser::create([
                'jadwal_id' => $request->jadwal_id,
                'user_id' => Auth::user()->id
            ]);
        }

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
            'ruangan' => Ruangan::all(),
            'mata_kuliah' => MataKuliah::all()
        ];

        return view('dashboard.jadwal.edit', $data);
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
            'kelas.required' => 'Kelas wajib diisi',
        ];

        $request->validate([
            'kelas' => 'required'
        ], $messages);

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
        if (Gate::allows('isAdmin')) {
            Jadwal::destroy($id);
        } elseif (Gate::allows('isUser')) {
            JadwalUser::where('id', $id)->where('user_id', Auth::user()->id)->delete();
        }

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}