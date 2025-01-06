<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index(Request $request)
    {

        // Kirim data gaji ke view
        return view('pages.cuti.index');
    }
}
