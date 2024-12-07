<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenRekapController extends Controller
{
    public function index()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();  // Tidak perlu menerima parameter $id lagi


        // Kirim data ke view
        return view('pages.absen-rekap.index', compact('user'));
    }
}
