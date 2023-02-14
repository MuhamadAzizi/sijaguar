<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = [
        'ruangan_id',
        'mata_kuliah_id',
        'kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'tahun_akademik_id'
    ];
}
