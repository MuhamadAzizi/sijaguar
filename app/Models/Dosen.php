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

    // One to one dosen ke mata kuliah
    public function mataKuliah()
    {
        return $this->hasOne(MataKuliah::class);
    }
}
