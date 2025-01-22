<?php

namespace App\Http\Controllers;

use App\Models\AbsenRekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsenRekapController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input tanggalmasuk dan tanggalkeluar dari request jika ada
        $tanggalmasuk = $request->input('tanggalmasuk'); // Untuk pencarian berdasarkan tanggal masuk
        $tanggalkeluar = $request->input('tanggalkeluar'); // Untuk pencarian berdasarkan tanggal keluar

        // Ambil id_nik dari pengguna yang sedang login
        $userId = Auth::user()->id_nik;  // Ganti dengan id_nik jika itu yang digunakan untuk pencarian

        // Jika ada pencarian berdasarkan tanggalmasuk dan tanggalkeluar
        if ($tanggalmasuk && $tanggalkeluar) {
            // Convert tanggal ke format Carbon
            $tanggalmasuk = Carbon::parse($tanggalmasuk)->startOfDay();
            $tanggalkeluar = Carbon::parse($tanggalkeluar)->endOfDay();

            // Cari berdasarkan rentang tanggal masuk dan keluar
            $absenrekap = AbsenRekap::where('nik_karyawan', $userId)
                ->whereDate('tanggalmasuk', '>=', $tanggalmasuk)  // Filter berdasarkan tanggal masuk
                ->whereDate('tanggalkeluar', '<=', $tanggalkeluar) // Filter berdasarkan tanggal keluar
                ->orderby('id', 'desc')
                ->paginate(7);
        }
        // Jika hanya ada pencarian berdasarkan tanggalmasuk
        elseif ($tanggalmasuk) {
            // Filter berdasarkan tanggalmasuk yang spesifik
            $absenrekap = AbsenRekap::where('nik_karyawan', $userId)
                ->whereDate('tanggalmasuk', $tanggalmasuk)  // Menggunakan whereDate untuk pencarian tanggal masuk
                ->orderby('id', 'desc')
                ->paginate(7);
        }
        // Jika hanya ada pencarian berdasarkan tanggalkeluar
        elseif ($tanggalkeluar) {
            // Filter berdasarkan tanggalkeluar yang spesifik
            $absenrekap = AbsenRekap::where('nik_karyawan', $userId)
                ->whereDate('tanggalkeluar', $tanggalkeluar)  // Menggunakan whereDate untuk pencarian tanggal keluar
                ->orderby('id', 'desc')
                ->paginate(7);
        }
        // Jika tidak ada input pencarian, ambil data semua berdasarkan nik_karyawan
        else {
            $absenrekap = AbsenRekap::where('nik_karyawan', $userId)
                ->orderby('id', 'desc')
                ->paginate(7);
        }

        // Kirim data ke view
        return view('pages.absen-rekap.index', compact('absenrekap', 'tanggalmasuk', 'tanggalkeluar'));
    }
}
