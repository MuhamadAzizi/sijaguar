<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaan;
use App\Models\VerifikasiJadwal;

class ViewModeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jadwal',
        ];

        // Pembagian sesi waktu jadwal
        $sesi_pertama = array();
        $sesi_pertama['jam_masuk'] = '08:00:00';
        $sesi_pertama['jam_keluar'] = '12:00:00';

        $sesi_kedua = array();
        $sesi_kedua['jam_masuk'] = '13:00:00';
        $sesi_kedua['jam_keluar'] = '17:00:00';

        $sesi_ketiga = array();
        $sesi_ketiga['jam_masuk'] = '18:30:00';
        $sesi_ketiga['jam_keluar'] = '22:00:00';

        $sekarang = date('H:i:s');

        if ($sekarang >= $sesi_pertama['jam_masuk'] && $sekarang <= $sesi_pertama['jam_keluar']) {
            $data['sesi'] = 'Sesi 1' . ' (' . $sesi_pertama['jam_masuk'] . ' - ' . $sesi_pertama['jam_keluar'] . ')';
            $data['verifikasi_jadwal'] = VerifikasiJadwal::join('jadwal', 'verifikasi_jadwal.jadwal_id', '=', 'jadwal.id')
                ->join('mata_kuliah', 'jadwal.mata_kuliah_id', '=', 'mata_kuliah.id')
                ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id')
                ->leftJoin('dosen', function ($join) {
                    $join->on('mata_kuliah.dosen_id', 'dosen.id')
                        ->whereNotNull('mata_kuliah.dosen_id');
                })
                ->select('verifikasi_jadwal.*', 'mata_kuliah.kode_mk', 'mata_kuliah.nama_mk', 'dosen.nama_dosen as dosen', 'mata_kuliah.sks', 'mata_kuliah.t_p', 'jadwal.kelas', 'jadwal.hari', 'jadwal.jam_mulai', 'jadwal.jam_selesai', 'ruangan.no_ruangan')
                ->where('verifikasi_jadwal.created_at', 'like', date('Y-m-d') . '%')
                ->where('jadwal.jam_mulai', '>=', $sesi_pertama['jam_masuk'])
                ->where('jadwal.jam_mulai', '<=', $sesi_pertama['jam_keluar'])
                ->orderBy('jadwal.jam_mulai', 'asc')
                ->get();
            $data['penggunaan'] = Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->where('penggunaan.status', 'Diterima')
                ->where('tanggal_penggunaan', date('Y-m-d'))
                ->where('penggunaan.jam_masuk', '>=', $sesi_pertama['jam_masuk'])
                ->where('penggunaan.jam_masuk', '<=', $sesi_pertama['jam_keluar'])
                ->orderBy('penggunaan.jam_masuk', 'asc')
                ->get();
        } elseif ($sekarang >= $sesi_kedua['jam_masuk'] && $sekarang <= $sesi_kedua['jam_keluar']) {
            $data['sesi'] = 'Sesi 2' . ' (' . $sesi_kedua['jam_masuk'] . ' - ' . $sesi_kedua['jam_keluar'] . ')';
            $data['verifikasi_jadwal'] = VerifikasiJadwal::join('jadwal', 'verifikasi_jadwal.jadwal_id', '=', 'jadwal.id')
                ->join('mata_kuliah', 'jadwal.mata_kuliah_id', '=', 'mata_kuliah.id')
                ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id')
                ->leftJoin('dosen', function ($join) {
                    $join->on('mata_kuliah.dosen_id', 'dosen.id')
                        ->whereNotNull('mata_kuliah.dosen_id');
                })
                ->select('verifikasi_jadwal.*', 'mata_kuliah.kode_mk', 'mata_kuliah.nama_mk', 'dosen.nama_dosen as dosen', 'mata_kuliah.sks', 'mata_kuliah.t_p', 'jadwal.kelas', 'jadwal.hari', 'jadwal.jam_mulai', 'jadwal.jam_selesai', 'ruangan.no_ruangan')
                ->where('verifikasi_jadwal.created_at', 'like', date('Y-m-d') . '%')
                ->where('jadwal.jam_mulai', '>=', $sesi_kedua['jam_masuk'])
                ->where('jadwal.jam_mulai', '<=', $sesi_kedua['jam_keluar'])
                ->orderBy('jadwal.jam_mulai', 'asc')
                ->get();
            $data['penggunaan'] = Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->where('penggunaan.status', 'Diterima')
                ->where('tanggal_penggunaan', date('Y-m-d'))
                ->where('penggunaan.jam_masuk', '>=', $sesi_kedua['jam_masuk'])
                ->where('penggunaan.jam_masuk', '<=', $sesi_kedua['jam_keluar'])
                ->orderBy('penggunaan.jam_masuk', 'asc')
                ->get();
        } elseif ($sekarang >= $sesi_ketiga['jam_masuk'] && $sekarang <= $sesi_ketiga['jam_keluar']) {
            $data['sesi'] = 'Sesi 3' . ' (' . $sesi_ketiga['jam_masuk'] . ' - ' . $sesi_ketiga['jam_keluar'] . ')';
            $data['verifikasi_jadwal'] = VerifikasiJadwal::join('jadwal', 'verifikasi_jadwal.jadwal_id', '=', 'jadwal.id')
                ->join('mata_kuliah', 'jadwal.mata_kuliah_id', '=', 'mata_kuliah.id')
                ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id')
                ->leftJoin('dosen', function ($join) {
                    $join->on('mata_kuliah.dosen_id', 'dosen.id')
                        ->whereNotNul('mata_kuliah.dosen_id');
                })
                ->select('verifikasi_jadwal.*', 'mata_kuliah.kode_mk', 'mata_kuliah.nama_mk', 'dosen.nama_dosen as dosen', 'mata_kuliah.sks', 'mata_kuliah.t_p', 'jadwal.kelas', 'jadwal.hari', 'jadwal.jam_mulai', 'jadwal.jam_selesai', 'ruangan.no_ruangan')
                ->where('verifikasi_jadwal.created_at', 'like', date('Y-m-d') . '%')
                ->where('jadwal.jam_mulai', '>=', $sesi_ketiga['jam_masuk'])
                ->where('jadwal.jam_mulai', '<=', $sesi_ketiga['jam_keluar'])
                ->orderBy('jadwal.jam_mulai', 'asc')
                ->get();
            $data['penggunaan'] = Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->where('penggunaan.status', 'Diterima')
                ->where('tanggal_penggunaan', date('Y-m-d'))
                ->where('penggunaan.jam_masuk', '>=', $sesi_ketiga['jam_masuk'])
                ->where('penggunaan.jam_masuk', '<=', $sesi_ketiga['jam_keluar'])
                ->orderBy('penggunaan.jam_masuk', 'asc')
                ->get();
        } else {
            $data['sesi'] = '';
            $data['verifikasi_jadwal'] = [];
            $data['penggunaan'] = [];
        }

        // Update penggunaan ruangan (naive approach)
        Penggunaan::where('tanggal_penggunaan', date('Y-m-d'))
            ->where('jam_keluar', '<', date('H:i:s'))
            ->where('status', 'Diterima')
            ->update(['status' => 'Selesai']);

        return view('view', $data);
    }
}
