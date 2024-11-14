<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        // Memverifikasi password yang tidak menggunakan bcrypt
        if ($user && $user->password === $request->password) {
            Auth::login($user);
            return redirect()->route('home');
        }

        return back()->withErrors([
            'password' => 'The provided credentials are incorrect.',
        ]);
    }

    public function showLoginForm()
    {
        return redirect('/');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus session dan token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
