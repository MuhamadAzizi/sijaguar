<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $fillable = [
        'kode_dosen',
        'nama_dosen',
        'no_telp',
        'email'
    ];

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }
}
