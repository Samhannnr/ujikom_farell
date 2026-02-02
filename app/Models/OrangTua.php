<?php
// app/Models/OrangTua.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'kontak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anak()
    {
        return $this->belongsToMany(Siswa::class, 'orangtua_siswa','orang_tua_id','siswa_id');
    }
}
