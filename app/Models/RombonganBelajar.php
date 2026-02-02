<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RombonganBelajar extends Model
{
    use HasFactory;

    protected $table = 'rombongan_belajar';

    protected $fillable = [
        'nama_rombel',
        'tahun_ajar_id',
    ];

    // Relasi ke TahunAjar
    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class, 'tahun_ajar_id');
    }

    // Relasi ke AnggotaRombel
    public function anggotaRombel()
    {
        return $this->hasMany(AnggotaRombel::class, 'rombongan_belajar_id');
    }

    // Relasi ke Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'rombongan_belajar_id');
    }
}
