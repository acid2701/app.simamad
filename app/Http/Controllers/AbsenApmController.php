<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Picqer\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorHTML;
use App\Http\Controllers\Controller;

class AbsenApmController extends Controller
{
    public function index()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Ambil data karyawan berdasarkan relasi
        $karyawan = $user->karyawan; // Mengambil data karyawan terkait

        // Jika tidak ada data karyawan, berikan respon alternatif
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Data karyawan tidak ditemukan untuk user ini.');
        }

        // Menggunakan BarcodeGeneratorHTML untuk menghasilkan barcode
        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($user->token, BarcodeGenerator::TYPE_CODE_128, 2, 80);

        // Kirim data ke view
        return view('pages.absen-apm.index', compact('user', 'karyawan', 'barcode'));
    }
}
