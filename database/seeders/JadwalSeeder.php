<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal')->insert([
            [
                'ruangan_id' => 5,
                'mata_kuliah_id' => 1,
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '09:30:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 6,
                'mata_kuliah_id' => 2,
                'hari' => 'Selasa',
                'jam_mulai' => '14:45:00',
                'jam_selesai' => '16:15:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 5,
                'mata_kuliah_id' => 3,
                'hari' => 'Kamis',
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '15:30:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 3,
                'mata_kuliah_id' => 4,
                'hari' => 'Rabu',
                'jam_mulai' => '13:30:00',
                'jam_selesai' => '14:30:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 1,
                'mata_kuliah_id' => 5,
                'hari' => 'Sabtu',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '12:00:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 1,
                'mata_kuliah_id' => 6,
                'hari' => 'Jumat',
                'jam_mulai' => '14:30:00',
                'jam_selesai' => '15:30:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 5,
                'mata_kuliah_id' => 7,
                'hari' => 'Selasa',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '12:30:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 6,
                'mata_kuliah_id' => 8,
                'hari' => 'Senin',
                'jam_mulai' => '09:30:00',
                'jam_selesai' => '11:00:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 6,
                'mata_kuliah_id' => 9,
                'hari' => 'Senin',
                'jam_mulai' => '13:15:00',
                'jam_selesai' => '14:45:00',
                'tahun_akademik_id' => 3
            ],
            [
                'ruangan_id' => 7,
                'mata_kuliah_id' => 10,
                'hari' => 'Sabtu',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '22:00:00',
                'tahun_akademik_id' => 3
            ]
        ]);
    }
}
