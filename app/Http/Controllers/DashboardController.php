<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penggunaan;
use App\Models\Jadwal;
use App\Models\JadwalUser;

class DashboardController extends Controller
{
    protected $hari;

    public function __construct()
    {
        // Konversi hari ke dalam bahasa indonesia
        $this->hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        if (Auth::user()->level == 'Admin') {
            // Count penggunaan semua user
            $data['count_penggunaan_menunggu'] = Penggunaan::where('status', 'Menunggu')->count();
            $data['count_penggunaan_diterima'] = Penggunaan::where('status', 'Diterima')->count();
            $data['count_penggunaan_ditolak'] = Penggunaan::where('status', 'Ditolak')->count();
            $data['count_penggunaan_selesai'] = Penggunaan::where('status', 'Selesai')->count();

            // Get jadwal selanjutnya
            $data['jadwal'] = Jadwal::join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->join('mata_kuliah', 'jadwal.mata_kuliah_id', '=', 'mata_kuliah.id')
                ->select('jadwal.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'mata_kuliah.*')
                ->where('jadwal.hari', $this->hari[date('l')])
                ->where('jadwal.jam_mulai', '>', date('H:i:s'))
                ->orderBy('jadwal.jam_mulai', 'asc')
                ->get();

            // Get penggunaan menunggu
            $data['penggunaan'] = Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->where('penggunaan.status', 'Menunggu')
                ->orderBy('penggunaan.created_at', 'desc')
                ->get();
        } elseif (Auth::user()->level == 'User') {
            // Count penggunaan berdasarkan user login
            $data['count_penggunaan_menunggu'] = Penggunaan::where('status', 'Menunggu')->where('user_id', Auth::user()->id)->count();
            $data['count_penggunaan_diterima'] = Penggunaan::where('status', 'Diterima')->where('user_id', Auth::user()->id)->count();
            $data['count_penggunaan_ditolak'] = Penggunaan::where('status', 'Ditolak')->where('user_id', Auth::user()->id)->count();
            $data['count_penggunaan_selesai'] = Penggunaan::where('status', 'Selesai')->where('user_id', Auth::user()->id)->count();

            // Get jadwal selanjutnya berdasrkan user login
            $data['jadwal'] = JadwalUser::join('jadwal', 'jadwal_user.jadwal_id', '=', 'jadwal.id')
                ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->join('mata_kuliah', 'jadwal.mata_kuliah_id', '=', 'mata_kuliah.id')
                ->select('jadwal.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'mata_kuliah.*')
                ->where('jadwal_user.user_id', Auth::user()->id)
                ->where('jadwal.hari', $this->hari[date('l')])
                ->where('jadwal.jam_mulai', '>', date('H:i:s'))
                ->orderBy('jadwal.jam_mulai', 'asc')
                ->get();

            // Get penggunaan menunggu berdasarkan user login
            $data['penggunaan'] = Penggunaan::join('ruangan', 'penggunaan.ruangan_id', '=', 'ruangan.id')
                ->join('jenis_ruangan', 'ruangan.jenis_ruangan_id', '=', 'jenis_ruangan.id')
                ->join('users', 'penggunaan.user_id', '=', 'users.id')
                ->select('penggunaan.*', 'ruangan.no_ruangan', 'jenis_ruangan.nama_jenis_ruangan', 'users.username')
                ->where('penggunaan.status', 'Menunggu')
                ->where('penggunaan.user_id', Auth::user()->id)
                ->orderBy('penggunaan.created_at', 'desc')
                ->get();
        }

        return view('dashboard/index', $data);
    }
}
