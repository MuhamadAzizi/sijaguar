<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiJadwal extends Model
{
    use HasFactory;

    protected $table = 'verifikasi_jadwal';
    protected $fillable = ['jadwal_id', 'status'];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
