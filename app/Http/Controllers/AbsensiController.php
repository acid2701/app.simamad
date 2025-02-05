<?php

namespace App\Http\Controllers;

use App\Models\AbsenRekap;
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {

        // Kirim data gaji ke view
        return view('pages.absensi.index');
    }

    public function create()
    {
        return view('pages.absensi.create');
    }

    // Menyimpan data absensi (absen masuk atau keluar)
    public function store(Request $request)
    {
        if (Auth::check()) {


            // Validasi QR code
            $request->validate([
                'qr_code' => 'required|string',
            ]);

            // Mencari Master dengan QR Code yang dipindai
            $master = Master::where('relasi', $request->qr_code)->first();

            if ($master) {
                // Cari apakah karyawan sudah melakukan absensi
                $absenRekap = AbsenRekap::where('nik_karyawan', $request->user()->id_nik)
                    ->where('tanggalmasuk', now()->toDateString())
                    ->first();

                if (!$absenRekap) {
                    // Jika belum absen masuk, lakukan absen masuk
                    $absenRekap = new AbsenRekap([
                        'nik_karyawan' => $request->user()->id_nik,
                        'nama_karyawan' => $request->user()->username,
                        'username' => $request->user()->username,
                        'unit_karyawan' => 'Unit A',  // Sesuaikan unit
                        'jammasuk' => now(),
                        'tanggalmasuk' => now()->toDateString(),
                        'jamkeluar' => null,
                        'tanggalkeluar' => null,
                        'Jam' => now()->toTimeString(),
                    ]);
                    $absenRekap->save();

                    return response()->json([
                        'message' => 'Absensi masuk berhasil!',
                        'status' => 'success',
                        'action' => 'absen_keluar', // Mengubah tombol menjadi absen keluar
                    ]);
                } else {
                    // Jika sudah absen masuk, lakukan absen keluar
                    $absenRekap->update([
                        'jamkeluar' => now(),
                        'tanggalkeluar' => now()->toDateString(),
                    ]);

                    return response()->json([
                        'message' => 'Absensi keluar berhasil!',
                        'status' => 'success',
                        'action' => 'absen_masuk', // Kembali ke tombol absen masuk
                    ]);
                }
            }

            return response()->json([
                'message' => 'QR Code tidak valid!',
                'status' => 'error',
            ], 400);
        }
    }
}
