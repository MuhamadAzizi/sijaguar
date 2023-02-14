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
                'dosen_id' => 1,
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11B202',
                'nama_mk' => 'Aljabar Linier',
                'dosen_id' => 2,
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11B344',
                'nama_mk' => 'Testing & Implementasi Sistem Informasi',
                'dosen_id' => 3,
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C218',
                'nama_mk' => 'Pemrograman Web III (PHP Lanjut)',
                'dosen_id' => 4,
                'sks' => 2,
                't_p' => 'P',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C308',
                'nama_mk' => 'Pemrograman Perangkat Mobile I',
                'dosen_id' => 5,
                'sks' => 4,
                't_p' => 'P',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C313',
                'nama_mk' => 'Pemrograman Visual III (VB.NET)',
                'dosen_id' => 6,
                'sks' => 2,
                't_p' => 'P',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C409',
                'nama_mk' => 'SCM (Supply Chain Management)',
                'dosen_id' => 7,
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11E447',
                'nama_mk' => 'Interpersonal Skill',
                'dosen_id' => 8,
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'UNIVA309',
                'nama_mk' => 'Bahasa Inggris V',
                'dosen_id' => 9,
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'UNIVA403',
                'nama_mk' => 'Kuliah Kerja Praktek (KKP)',
                'dosen_id' => null,
                'sks' => 3,
                't_p' => 'P',
                'semester' => 5,
            ]
        ]);
    }
}
