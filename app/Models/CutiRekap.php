<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutiRekap extends Model
{
    protected $table = 'v_cuti';  // Nama view di database

    protected $fillable = [
        'id_karyawan',
        'nama_karyawan',
        'unit_karyawan',
        'tipe_karyawan',
        'unit_kerja',
        'nama',
        'jenis_pengajuan',
        'tgl_cuti',
        'approve',
        'tanggal',
        'keterangan',
        'idkaru',
        'idliterasi',
        'catatan',

    ];
}
