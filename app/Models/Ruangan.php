<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $fillable = [
        'no_ruangan',
        'jenis_ruangan_id',
    ];

    public function penggunaan()
    {
        return $this->hasMany(Penggunaan::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    // Reverse one to one relationship
    public function jenisRuangan()
    {
        return $this->belongsTo(JenisRuangan::class);
    }
}
