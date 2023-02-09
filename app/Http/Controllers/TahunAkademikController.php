<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAkademik;

class TahunAkademikController extends Controller
{
    public function store(Request $request)
    {
        $messages = [
            'tahun_akademik.required' => 'Tahun Akademik harus diisi',
            'tahun_akademik.size' => 'Tahun Akademik harus 9 karakter',
            'semester.required' => 'Semester harus diisi',
        ];

        $request->validate([
            'tahun_akademik' => 'required|size:9',
            'semester' => 'required',
        ], $messages);

        TahunAkademik::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);

        TahunAkademik::create([
            'tahun_akademik' => $request->tahun_akademik,
            'semester' => $request->semester,
            'status' => 'Aktif'
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Tahun Akademik berhasil ditambahkan');
    }
}
