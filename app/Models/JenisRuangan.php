<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisRuangan extends Model
{
    use HasFactory;

    protected $table = 'jenis_ruangan';
    protected $fillable = [
        'nama_jenis_ruangan'
    ];

    // One to one relationship
    public function ruangan()
    {
        return $this->hasOne(Ruangan::class);
    }
}
