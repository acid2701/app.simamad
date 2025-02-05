<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\CutiRekap;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSimamad;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CutiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Ambil data karyawan berdasarkan relasi
        $karyawan = $user->karyawan; // Mengambil data karyawan terkait

        // Ambil input tgl_cuti_dari dan tgl_cuti_sampai dari request untuk pencarian rentang tanggal
        $tgl_cuti_dari = $request->input('tgl_cuti_dari');
        $tgl_cuti_sampai = $request->input('tgl_cuti_sampai');

        // Ambil id_karyawan dari pengguna yang sedang login
        $userId = Auth::user()->id_nik;  // Ganti dengan id_karyawan jika itu yang digunakan

        // Mulai query dengan pencarian berdasarkan id_karyawan
        $query = CutiRekap::where('id_karyawan', $userId);

        // Jika ada pencarian berdasarkan tgl_cuti_dari dan tgl_cuti_sampai
        if ($tgl_cuti_dari && $tgl_cuti_sampai) {
            // Convert tgl_cuti_dari dan tgl_cuti_sampai ke format Carbon
            $tgl_cuti_dari = Carbon::parse($tgl_cuti_dari)->startOfDay();
            $tgl_cuti_sampai = Carbon::parse($tgl_cuti_sampai)->endOfDay();

            // Filter berdasarkan rentang tanggal
            $query->whereBetween('tgl_cuti', [$tgl_cuti_dari, $tgl_cuti_sampai]);
        }
        // Jika hanya ada pencarian berdasarkan tgl_cuti_dari
        elseif ($tgl_cuti_dari) {
            // Filter berdasarkan tgl_cuti_dari
            $tgl_cuti_dari = Carbon::parse($tgl_cuti_dari)->startOfDay();
            $query->where('tgl_cuti', '>=', $tgl_cuti_dari);
        }
        // Jika hanya ada pencarian berdasarkan tgl_cuti_sampai
        elseif ($tgl_cuti_sampai) {
            // Filter berdasarkan tgl_cuti_sampai
            $tgl_cuti_sampai = Carbon::parse($tgl_cuti_sampai)->endOfDay();
            $query->where('tgl_cuti', '<=', $tgl_cuti_sampai);
        }

        // Urutkan berdasarkan id dan paginate
        $cutirekap = $query->orderby('id', 'desc')->paginate(7);

        // Kirim data ke view
        return view('pages.cuti.index', compact('cutirekap', 'tgl_cuti_dari', 'tgl_cuti_sampai', 'karyawan'));
    }


    public function create()
    {
        $usimamad = UserSimamad::orderBy('nama_karyawan', 'ASC')->get();
        $user = User::all();
        // return view('form.blade.php')
        return view('pages.cuti.create', compact('usimamad', 'user'));
    }

    public function store(Request $request)
    {

        if (Auth::check()) {

            $request->validate([

                'jenis_pengajuan' => 'required',
                'tgl_cuti' => 'required',
                'keterangan' => 'required',
                'idkaru' => 'required|exists:v_user_simamad,id_nik',

            ]);

            $idkaru = $request->idkaru;


            Cuti::create([
                'id_karyawan' => Auth::user()->id_nik,
                'jenis_pengajuan' => $request->jenis_pengajuan,
                'tgl_cuti' => $request->tgl_cuti,
                'approve' => $request->approve ?? 0,
                'tanggal' => now(),
                'keterangan' => $request->keterangan,
                'idkaru' => $idkaru,
            ]);

            return redirect()->route('cuti.index')->with(['berhasil' => 'Pengajuan Berhasil dikirim!']);
        }
    }
}
