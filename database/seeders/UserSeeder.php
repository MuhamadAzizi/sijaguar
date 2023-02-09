<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'nama' => 'Admin',
                'level' => 'Admin',
                'foto' => 'admin.png'
            ],
            [
                'username' => 'user',
                'password' => bcrypt('user'),
                'nama' => 'User',
                'level' => 'User',
                'foto' => 'user.png'
            ],
        ]);
    }
}
