<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;

    protected $table = 'penggunaan';
    protected $fillable = ['user_id', 'ruangan_id', 'tanggal_penggunaan', 'jam_masuk', 'jam_keluar', 'status', 'keterangan'];
}
