<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = 'master_db';  // Nama view di database

    protected $fillable = [

        'id',
        'nama',
        'relasi',
        'keterangan',
        'subbagian',
        'tgl',
        'jammasuk',
        'jampulang',
        'modified_at',

    ];
}
