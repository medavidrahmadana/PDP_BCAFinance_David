<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route Login
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// Route Register
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route Sistem
    Route::prefix('pengajuan')->name('pengajuan.')->group(function () {
        Route::get('/create', [PengajuanController::class, 'create'])->name('create');
        Route::post('/', [PengajuanController::class, 'store'])->name('store');
    });

    // Route Atasan
    Route::prefix('approval')->name('approval.')->group(function () {
        Route::get('/', [ApprovalController::class, 'index'])->name('index');
        Route::get('/{id}', [ApprovalController::class, 'show'])->name('show');
        Route::post('/{id}/approve', [ApprovalController::class, 'approve'])->name('approve');
        Route::post('/{id}/reject', [ApprovalController::class, 'reject'])->name('reject');
    });
});

// Switch Role (Development Only)
Route::get('/switch-role/{role}', function ($role) {
    $allowed = ['staff', 'atasan', 'admin'];

    if (!in_array($role, $allowed)) {
        return redirect()->back()->with('error', 'Role tidak valid.');
    }

    $user = Auth::user();
    $user->role = $role;
    $user->save();

    return redirect()->route('dashboard')->with('success', 'Role berhasil diganti ke: ' . ucfirst($role));
})->middleware('auth')->name('switch.role');
