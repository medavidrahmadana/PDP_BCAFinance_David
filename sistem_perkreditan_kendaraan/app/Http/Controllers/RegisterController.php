<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Menyimpan user baru ke database.
     */
    public function store(Request $request)
    {
        //Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru
        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Akun Anda berhasil dibuat!');
    }

    /**
     * Menambahkan fungsi Logout sekalian
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}