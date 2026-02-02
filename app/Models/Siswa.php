<?php
// app/Models/Siswa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nis',
        'nama',
        'jk',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anggotaKelas()
    {
        return $this->hasMany(AnggotaKelas::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function izin()
    {
        return $this->hasMany(Izin::class);
    }

    public function pointLogs()
    {
        return $this->hasMany(PointLogs::class);
    }

    public function pkl()
    {
        return $this->hasMany(Pkl::class);
    }

    public function qrCodes()
    {
        return $this->hasMany(QrCode::class);
    }

    public function orangTua()
    {
        return $this->belongsToMany(OrangTua::class,'orangtua_siswa','siswa_id','orang_tua_id');
    }
}
