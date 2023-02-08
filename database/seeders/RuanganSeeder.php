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
            'no_ruangan' => [
                'LG.001',
                'LG.002',
                'LG.003',
                'LG.HDD',
                '03.001',
                '03.002',
                '03.007',
            ],
            'jenis_ruangan_id' => [
                '2',
                '2',
                '2',
                '3',
                '1',
                '1',
                '1',
            ],
        ]);
    }
}
