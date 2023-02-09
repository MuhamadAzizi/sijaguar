<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal_user')->insert([
            [
                'user_id' => 2,
                'jadwal_id' => 1,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 2,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 3,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 4,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 5,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 6,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 7,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 8,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 9,
            ],
            [
                'user_id' => 2,
                'jadwal_id' => 10,
            ],
        ]);
    }
}
