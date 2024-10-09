<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
        'nama', 
        'jenis_kelamin', 
        'tgl_lahir', 
        'no_telp', 
        'alamat', 
        'email', 
        'foto_profil'
    ];
}
