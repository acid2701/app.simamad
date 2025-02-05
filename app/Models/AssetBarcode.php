<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetBarcode extends Model
{
    protected $table = 'v_asetbarcode';

    protected $fillable = [
        'id_inv',
        'kode_inv',
        'tgl_pengadaan',
        'namabarang',
        'jenis',
        'subjenis',
        'merek',
        'type',
        'seri',
        'kondisi',
        'milikunit',
        'created_at',
    ];

    public $timestamps = false;
}
