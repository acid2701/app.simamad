<?php

namespace App\Http\Controllers;

use App\Models\Pakku;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PakkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pakku = Pakku::when($request->keyword, function ($query) use ($request) {
            $query->where('terlapor', 'like', "%{$request->keyword}%")
                ->orWhere('unit', 'like', "%{$request->keyword}%")->orWhere('tempat', 'like', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate(10);

        // Mengirim data ke view
        return view('pages.pakku.index', compact('pakku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.pakku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (Auth::check()) {

            $request->validate([
                'terlapor' => 'required',
                'unit' => 'required',
                'laporan' => 'required',
            ]);

            Pakku::create([
                'terlapor' => $request->terlapor,
                'unit' => $request->unit,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'tempat' => $request->tempat,
                'laporan' => $request->laporan,
                'saran' => $request->saran,


            ]);
        }

        return redirect()->route('pakku.create')->with('berhasil', 'Terimakasih Laporan berhasil di Kirim');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pakku $pakku)
    {
        $pakku->delete();
        return redirect()->route('pakku.index')->with('berhasil', 'Selamat Laporan berhasil di Hapus');
    }
}
