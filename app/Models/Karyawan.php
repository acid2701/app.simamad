<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';  // Nama view di database

    protected $fillable = [

        'id',
        'nik_karyawan',
        'nama_karyawan',
        'unit_karyawan',
        'tanggallahir_karyawan',
        'alamat_karyawan',
        'jenkel_karyawan',
        'status_daftar',
        'unit_kerja',
        'tipe_karyawan',
        'mulai_bekerja',
        'aktif',
        'jabatan',
        'pendidikan',
        'no_str',
        'masaberlaku_str',
        'no_sip',
        'terbit_sip',
        'no_ktp',
        'nohp',
        'jatah_cuti',
        'is_manajemen',
        'totalcuti',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_nik'); // 'id' di tabel karyawan, 'id_nik' di tabel users
    }
}
