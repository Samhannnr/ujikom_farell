<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahunAjar extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajar';

    protected $fillable = [
        'nama_tahun',
        'status',
    ];

    // Relasi ke RombonganBelajar
    public function rombonganBelajar()
    {
        return $this->hasMany(RombonganBelajar::class, 'tahun_ajar_id');
    }
}
