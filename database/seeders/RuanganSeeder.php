<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruangan')->insert([
            [
                'no_ruangan' => 'LG.001',
                'jenis_ruangan_id' => 2,
            ],
            [
                'no_ruangan' => 'LG.002',
                'jenis_ruangan_id' => 2,
            ],
            [
                'no_ruangan' => 'LG.003',
                'jenis_ruangan_id' => 2,
            ],
            [
                'no_ruangan' => 'LG.HDD',
                'jenis_ruangan_id' => 3,
            ],
            [
                'no_ruangan' => '03.001',
                'jenis_ruangan_id' => 1,
            ],
            [
                'no_ruangan' => '03.002',
                'jenis_ruangan_id' => 1,
            ],
            [
                'no_ruangan' => '03.007',
                'jenis_ruangan_id' => 1,
            ]
        ]);
    }
}
