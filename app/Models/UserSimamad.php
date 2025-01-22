<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSimamad extends Model
{
    protected $table = 'v_user_simamad';  // Nama view di database

    protected $fillable = [
        'id_nik',
        'username',
        'id',
        'password',
        'nama_karyawan',
        'is_manajemen',
        'nama',
    ];
}
