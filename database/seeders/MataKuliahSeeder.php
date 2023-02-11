<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata_kuliah')->insert([
            [
                'kode_mk' => 'TI11B201',
                'nama_mk' => 'Ilmu Hukum ITE',
                'dosen' => 'AKBP Ari Askari, SH., MH',
                'sks' => 2,
                't_p' => 'T',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11B202',
                'nama_mk' => 'Aljabar Linier',
                'dosen' => 'Anisya Cahya Melati, M.Stat',
                'sks' => 2,
                't_p' => 'T',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11B344',
                'nama_mk' => 'Testing & Implementasi Sistem Informasi',
                'dosen' => 'Saefudin, M.Kom',
                'sks' => 2,
                't_p' => 'T',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C218',
                'nama_mk' => 'Pemrograman Web III (PHP Lanjut)',
                'dosen' => 'Ahmad Dedi Jubaedi, ST., M.Kom',
                'sks' => 2,
                't_p' => 'P',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C308',
                'nama_mk' => 'Pemrograman Perangkat Mobile I',
                'dosen' => 'Wahyudin Nor Achmad, ST., M.Kom',
                'sks' => 4,
                't_p' => 'P',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C313',
                'nama_mk' => 'Pemrograman Visual III (VB.NET)',
                'dosen' => 'Agus Setyawan, M.Kom',
                'sks' => 2,
                't_p' => 'P',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C409',
                'nama_mk' => 'SCM (Supply Chain Management)',
                'dosen' => 'Vidila Rosalina, M.Kom',
                'sks' => 2,
                't_p' => 'T',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11E447',
                'nama_mk' => 'Interpersonal Skill',
                'dosen' => 'Ayu Purnama Sari, M.Kom',
                'sks' => 2,
                't_p' => 'T',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'UNIVA309',
                'nama_mk' => 'Bahasa Inggris V',
                'dosen' => 'Erma Perwitasari, SS. M.Pd',
                'sks' => 2,
                't_p' => 'T',
                'kelas' => 'A2',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'UNIVA403',
                'nama_mk' => 'Kuliah Kerja Praktek (KKP)',
                'dosen' => null,
                'sks' => 3,
                't_p' => 'P',
                'kelas' => 'A2',
                'semester' => 5,
            ]
        ]);
    }
}
