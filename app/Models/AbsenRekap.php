<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsenRekap extends Model
{
    // Model ini tidak akan menggunakan tabel Eloquent secara default
    protected $table = 'rekap_absen';  // Nama view di database

    // Anda bisa menambahkan beberapa properti untuk mengatur atau memanipulasi data jika perlu
    protected $fillable = [
        'nik_karyawan',
        'jammasuk',
        'tanggalmasuk',
        'jamkeluar',
        'tanggalkeluar',

    ];
}
