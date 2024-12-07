<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsenApm extends Model
{
     // Tentukan nama tabel yang digunakan
     protected $table = 'user'; // Pastikan tabelnya sesuai dengan nama tabel yang ada

     // Tentukan field yang bisa diisi
     protected $fillable = ['id_nik'];

     // Menentukan primary key jika berbeda
     protected $primaryKey = 'id'; // Atau sesuai dengan primary key pada tabel Anda
}
