<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pakku extends Model
{
    protected $table = 'laporpakku';  // Nama view di database

    // Anda bisa menambahkan beberapa properti untuk mengatur atau memanipulasi data jika perlu
    protected $fillable = [
        'terlapor',
        'unit',
        'tanggal',
        'jam',
        'tempat',
        'laporan',
        'saran',
    ];

    public $timestamps = false; // Menonaktifkan timestamps
}
