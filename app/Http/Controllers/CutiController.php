<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSimamad;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index(Request $request)
    {

        // Kirim data gaji ke view
        return view('pages.cuti.index');
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
