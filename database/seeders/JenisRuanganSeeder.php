<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_ruangan')->insert([
            [
                'nama_jenis_ruangan' => 'Ruang Belajar',
            ],
            [
                'nama_jenis_ruangan' => 'Lab Komputer',
            ],
            [
                'nama_jenis_ruangan' => 'Lab HDDS',
            ],
            [
                'nama_jenis_ruangan' => 'UCC',
            ]
        ]);
    }
}
