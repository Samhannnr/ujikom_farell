<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'rombongan_belajar_id',
        'anggota_rombel_id',
        'status',
        'tanggal',
    ];

    // Relasi ke RombonganBelajar
    public function rombonganBelajar()
    {
        return $this->belongsTo(RombonganBelajar::class, 'rombongan_belajar_id');
    }

    // Relasi ke AnggotaRombel
    public function anggotaRombel()
    {
        return $this->belongsTo(AnggotaRombel::class, 'anggota_rombel_id');
    }
}
