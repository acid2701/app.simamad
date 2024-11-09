<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
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
}
