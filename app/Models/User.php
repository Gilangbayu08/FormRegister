<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email',
        'password',
        'nama_lengkap',
        'alamat',
        'gaji_pokok',
        'pinjaman',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
