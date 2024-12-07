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
        $user = Auth::user();  // Tidak perlu menerima parameter $id lagi

        // Menggunakan BarcodeGeneratorHTML untuk menghasilkan barcode dalam format HTML
        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($user->id_nik, BarcodeGenerator::TYPE_CODE_128);

        // Kirim data ke view
        return view('pages.absen-apm.index', compact('user', 'barcode'));
    }
    
}
