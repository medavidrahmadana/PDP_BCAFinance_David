<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman/form login.
     */
    public function create()
    {
        // Kita akan buat file view 'auth.login'
        return view('auth.login');
    }

    /**
     * Memproses percobaan login.
     */
    public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Coba autentikasi user
        if (Auth::attempt($credentials)) {
            // Jika berhasil
            $request->session()->regenerate(); // Regenerate session ID
            
            // Arahkan ke dashboard
            return redirect()->intended('dashboard');
        }

        // 3. Jika gagal
        // Lempar error kembali ke form login
        throw ValidationException::withMessages([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    /**
     * Pindahkan fungsi Logout ke sini agar lebih rapi.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // GANTI BARIS INI:
        // return redirect()->route('login.form');
        
        // MENJADI INI:
        return redirect()->route('login');
    }
}