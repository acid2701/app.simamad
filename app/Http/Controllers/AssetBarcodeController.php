<?php

namespace App\Http\Controllers;

use App\Models\AssetBarcode;
use Illuminate\Http\Request;

class AssetBarcodeController extends Controller
{
    // Menampilkan halaman index
    public function index()
    {
        return view('pages.asset-barcode.index');
    }

    // Menangani hasil scan
    public function scanResult(Request $request)
    {
        // Mengambil kode_inv yang dikirimkan oleh client
        $kode_inv = $request->kode_inv;

        // Mencari asset berdasarkan kode_inv
        $asset = AssetBarcode::where('kode_inv', $kode_inv)->first();

        // Jika asset ditemukan, kirimkan data asset
        if ($asset) {
            return response()->json([
                'success' => true,
                'data' => $asset,
            ]);
        }

        // Jika tidak ditemukan, kirimkan pesan error
        return response()->json([
            'success' => false,
            'message' => 'Asset tidak ditemukan.',
        ]);
    }
}
