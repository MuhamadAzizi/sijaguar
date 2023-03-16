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
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11B202',
                'nama_mk' => 'Aljabar Linier',
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11B344',
                'nama_mk' => 'Testing & Implementasi Sistem Informasi',
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C218',
                'nama_mk' => 'Pemrograman Web III (PHP Lanjut)',
                'sks' => 2,
                't_p' => 'P',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C308',
                'nama_mk' => 'Pemrograman Perangkat Mobile I',
                'sks' => 4,
                't_p' => 'P',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C313',
                'nama_mk' => 'Pemrograman Visual III (VB.NET)',
                'sks' => 2,
                't_p' => 'P',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11C409',
                'nama_mk' => 'SCM (Supply Chain Management)',
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'TI11E447',
                'nama_mk' => 'Interpersonal Skill',
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'UNIVA309',
                'nama_mk' => 'Bahasa Inggris V',
                'sks' => 2,
                't_p' => 'T',
                'semester' => 5,
            ],
            [
                'kode_mk' => 'UNIVA403',
                'nama_mk' => 'Kuliah Kerja Praktek (KKP)',
                'sks' => 3,
                't_p' => 'P',
                'semester' => 5,
            ]
        ]);
    }
}