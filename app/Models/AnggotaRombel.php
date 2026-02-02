<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggotaRombel extends Model
{
    use HasFactory;

    protected $table = 'anggota_rombel';

    protected $fillable = [
        'rombongan_belajar_id',
        'peserta_didik_id',
    ];

    // Relasi ke RombonganBelajar
    public function rombonganBelajar()
    {
        return $this->belongsTo(RombonganBelajar::class, 'rombongan_belajar_id');
    }

    // Relasi ke PesertaDidik
    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'peserta_didik_id');
    }

    // Relasi ke Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'anggota_rombel_id');
    }
}
