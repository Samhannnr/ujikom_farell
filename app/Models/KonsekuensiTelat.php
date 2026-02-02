<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KonsekuensiTelat extends Model
{
    use HasFactory;

    protected $table = 'konsekuensi_telat';

    protected $fillable = [
        'nama_konsekuensi',
        'jumlah_menit',
    ];
}
