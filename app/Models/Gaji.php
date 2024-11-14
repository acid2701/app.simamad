<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
   // Model ini tidak akan menggunakan tabel Eloquent secara default
   protected $table = 'v_gaji';  // Nama view di database

   // Anda bisa menambahkan beberapa properti untuk mengatur atau memanipulasi data jika perlu
   protected $fillable = [
       'tanggal_terbit', 'namabulan', 'id_karyawan', 'nama_karyawan', 'unit_karyawan',
       'gapok', 'lembur', 'tunjangan_jabatan', 'tunjangan_khusus', 'insentif', 'jam_malam',
       'jumlah_gaji', 'iuran_bpjs', 'jht', 'simpanan_wajib', 'dana_sosial', 'pertemuan',
       'absensi', 'kewajiban_hutang', 'zakat', 'pph', 'sembako', 'tabungan', 'bon',
       'lain_lain', 'jumlah_pot', 'jumlah_terima', 'tanggal_post'
   ];

   // Bisa menambahkan scope atau custom methods jika diperlukan
}
