<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tahun_akademik')->insert([
            [
                'tahun_akademik' => '2021/2022',
                'semester' => 'Ganjil',
                'status' => 'Tidak Aktif',
            ],
            [
                'tahun_akademik' => '2021/2022',
                'semester' => 'Genap',
                'status' => 'Tidak Aktif',
            ],
            [
                'tahun_akademik' => '2022/2023',
                'semester' => 'Ganjil',
                'status' => 'Aktif',
            ]
        ]);
    }
}
