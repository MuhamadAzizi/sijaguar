<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUser extends Model
{
    use HasFactory;

    protected $table = 'jadwal_user';
    protected $fillable = ['jadwal_id', 'user_id'];
}
