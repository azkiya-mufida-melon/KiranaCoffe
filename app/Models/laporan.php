<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_laporan',
        'id_pesanan',
        'id_metode_pembayaran',
        'tgl_laporan',
    ];
}
