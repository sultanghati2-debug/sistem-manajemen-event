<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

// 1. Jalur Utama (Landing Page) - Menggunakan Controller agar data Event bisa tampil
Route::get('/', [LandingPageController::class, 'index']);

// 2. Jalur Dashboard (Bawaan setelah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Jalur yang Harus Login (Terproteksi Middleware Auth)
Route::middleware('auth')->group(function () {
    
    // Rute Baru: Admin Dashboard Layout
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    // Rute Manajemen Profil User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. Jalur sistem login/register bawaan
require __DIR__.'/auth.php';