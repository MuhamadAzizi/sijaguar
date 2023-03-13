<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaan;
use App\Models\VerifikasiJadwal;
use App\Models\Jadwal;

class ViewModeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jadwal',
            'penggunaan' => Penggunaan::where('status', 'Diterima')
                ->where('tanggal_penggunaan', date('Y-m-d'))
                ->orderBy('jam_masuk', 'asc')
                ->get()
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
            $data['verifikasi_jadwal'] = VerifikasiJadwal::whereHas('jadwal', function ($query) use ($sesi_pertama) {
                $query->where('jadwal.jam_mulai', '>=', $sesi_pertama['jam_masuk'])
                    ->where('jadwal.jam_mulai', '<=', $sesi_pertama['jam_keluar']);
                    // ->orderBy('jadwal.jam_mulai', 'asc');
            })->where('verifikasi_jadwal.created_at', 'like', date('Y-m-d') . '%')->get();
        } elseif ($sekarang >= $sesi_kedua['jam_masuk'] && $sekarang <= $sesi_kedua['jam_keluar']) {
            $data['sesi'] = 'Sesi 2' . ' (' . $sesi_kedua['jam_masuk'] . ' - ' . $sesi_kedua['jam_keluar'] . ')';
            $data['verifikasi_jadwal'] = VerifikasiJadwal::whereHas('jadwal', function ($query) use ($sesi_kedua) {
                $query->where('jadwal.jam_mulai', '>=', $sesi_kedua['jam_masuk'])
                    ->where('jadwal.jam_mulai', '<=', $sesi_kedua['jam_keluar']);
                    // ->orderBy('jadwal.jam_mulai', 'asc');
            })->where('verifikasi_jadwal.created_at', 'like', date('Y-m-d') . '%')->get();
        } elseif ($sekarang >= $sesi_ketiga['jam_masuk'] && $sekarang <= $sesi_ketiga['jam_keluar']) {
            $data['sesi'] = 'Sesi 3' . ' (' . $sesi_ketiga['jam_masuk'] . ' - ' . $sesi_ketiga['jam_keluar'] . ')';
            $data['verifikasi_jadwal'] = VerifikasiJadwal::whereHas('jadwal', function ($query) use ($sesi_ketiga) {
                $query->where('jadwal.jam_mulai', '>=', $sesi_ketiga['jam_masuk'])
                    ->where('jadwal.jam_mulai', '<=', $sesi_ketiga['jam_keluar']);
                    // ->orderBy('jadwal.jam_mulai', 'asc');
            })->where('verifikasi_jadwal.created_at', 'like', date('Y-m-d') . '%')->get();
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