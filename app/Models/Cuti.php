<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';  // Nama view di database

    protected $fillable = [
        'id_karyawan',
        'jenis_pengajuan',
        'tgl_cuti',
        'approve',
        'tanggal',
        'keterangan',
        'idkaru',
        'idliterasi',
        'catatan',
    ];

    public $timestamps = false;
}
