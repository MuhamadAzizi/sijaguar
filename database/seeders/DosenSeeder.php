<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->insert([
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'AKBP Ari Askari, SH., MH',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Anisya Cahya Melati, M.Stat',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Saefudin, M.Kom',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Ahmad Dedi Jubaedi, ST., M.Kom',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Wahyudin Nor Achmad, ST., M.Kom',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Agus Setyawan, M.Kom',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Vidila Rosalina, M.Kom',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Ayu Purnama Sari, M.Kom',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
            [
                'kode_dosen' => '1',
                'nama_dosen' => 'Erma Perwitasari, SS. M.Pd',
                'no_telp' => '08',
                'email' => 'email@email.com'
            ],
        ]);
    }
}
