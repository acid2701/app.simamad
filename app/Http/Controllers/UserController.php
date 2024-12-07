<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan model User sudah di-import
use App\Models\Gaji;  // Jika menggunakan model Gaji untuk tabel v_gaji
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        // Validasi input untuk username (opsional, jika ingin memastikan query tidak kosong)
        $username = request('username') ? '%' . request('username') . '%' : '%';

        // Mengambil data pengguna dengan filter nama dan melakukan pagination
        $user = User::where('username', 'like', $username)
            ->orderby('id', 'desc')
            ->paginate(10);

        // Mengambil pengguna pertama dari hasil pagination
        $firstUser = $user->first(); // Bisa digunakan jika ingin memproses data pertama, jika perlu

        return view('pages.users.index', compact('user', 'firstUser'));
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', compact(var_name: 'user'));
    }

    public function update(Request $request, User $user)
    {

        
        return redirect()->route('users.index')->with('berhasil', 'Data user berhasil di Update');
    }
}
