<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input 'namabulan' dari request jika ada
        $namabulan = $request->input('namabulan');  // Bisa juga menggunakan request('namabulan')

        // Ambil id_nik dari pengguna yang sedang login
        $userId = Auth::user()->id_nik;  // Ganti dengan id_nik jika itu yang digunakan untuk pencarian

        // Jika ada input pencarian untuk namabulan
        if ($namabulan) {
            // Cari gaji berdasarkan namabulan dan id_karyawan
            $gaji = Gaji::where('namabulan', 'like', '%' . $namabulan . '%')
                ->where('id_karyawan', $userId)
                ->orderby('id', 'ASC')
                ->paginate(10);
        } else {
            // Jika tidak ada pencarian, ambil semua data berdasarkan id_karyawan
            $gaji = Gaji::where('id_karyawan', $userId)
                ->orderby('id', 'ASC')
                ->paginate(10);
        }

        // Kirim data gaji ke view
        return view('pages.gaji.index', compact('gaji'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gaji = Gaji::find($id); // Ambil data vendor berdasarkan ID
        return view('pages.gaji.show', compact('gaji')); // Kirim data vendor ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        //
    }
}
