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

        // Ambil input tgl_absen_dari dan tgl_absen_sampai dari request untuk pencarian rentang tanggal
        $tgl_absen_dari = $request->input('tgl_absen_dari');
        $tgl_absen_sampai = $request->input('tgl_absen_sampai');

        // Ambil id_nik dari pengguna yang sedang login
        $userId = Auth::user()->id_nik;

        // Mulai query dengan pencarian berdasarkan nik_karyawan
        $query = AbsenRekap::where('nik_karyawan', $userId);


        // Jika ada pencarian berdasarkan $tgl_absen_dari dan $tgl_absen_sampai
        if ($tgl_absen_dari && $tgl_absen_sampai) {
            // Convert $tgl_absen_dari dan $tgl_absen_sampai ke format Carbon
            $tgl_absen_dari = Carbon::parse($tgl_absen_dari)->startOfDay();
            $tgl_cuti_sampai = Carbon::parse($tgl_absen_sampai)->endOfDay();

            // Filter berdasarkan rentang tanggal
            $query->whereBetween('tanggalmasuk', [$tgl_absen_dari, $tgl_absen_sampai]);
        }
        // Jika hanya ada pencarian berdasarkan $tgl_absen_dari
        elseif ($tgl_absen_dari) {
            // Filter berdasarkan $tgl_absen_dari
            $tgl_absen_dari = Carbon::parse($tgl_absen_dari)->startOfDay();
            $query->where('tanggalmasuk', '>=', $tgl_absen_dari);
        }
        // Jika hanya ada pencarian berdasarkan$tgl_absen_sampai
        elseif ($tgl_absen_sampai) {
            // Filter berdasarkan $tgl_absen_sampai
            $tgl_absen_sampai = Carbon::parse($tgl_absen_sampai)->endOfDay();
            $query->where('tanggalmasuk', '<=', $tgl_absen_sampai);
        }



        // Urutkan berdasarkan id dan paginate
        $absenrekap = $query->orderby('id', 'desc')->paginate(7);

        // Kirim data ke view
        return view('pages.absen-rekap.index', compact('absenrekap', 'tgl_absen_dari', 'tgl_absen_sampai'));
    }
}
