<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    // Relasi ke guru
    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    // Relasi ke siswa
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    // Relasi ke orang tua
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }
}
