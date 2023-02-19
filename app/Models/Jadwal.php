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

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function verifikasiJadwal()
    {
        return $this->hasOne(VerifikasiJadwal::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'jadwal_user');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class);
    }
}