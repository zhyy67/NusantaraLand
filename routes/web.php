<?php

use App\Http\Controllers\BudayaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AvatarController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('home');

// Dashboard pemain
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Semua fitur yang membutuhkan login
Route::middleware('auth')->group(function () {

    // --- Profil Pemain ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Kuis Budaya ---
    Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
    Route::post('/kuis', [KuisController::class, 'submit'])->name('kuis.submit');

    // --- Peta dan Informasi Budaya ---
    Route::get('/budaya', [BudayaController::class, 'index'])->name('budaya.index');
    Route::get('/budaya/{nama}', [BudayaController::class, 'show'])->name('budaya.show');

    // --- Kustomisasi Avatar ---
    Route::get('/avatar', [AvatarController::class, 'index'])->name('avatar.index');
    Route::get('/avatar/kostumisasi', [AvatarController::class, 'kostumisasi'])->name('avatar.kostumisasi');
    Route::post('/avatar/update', [AvatarController::class, 'update'])->name('avatar.update');
    Route::post('/avatar/beli', [AvatarController::class, 'beli'])->name('avatar.beli'); 
});

// Route login, register, logout dari Laravel Breeze
// HARUS DI LUAR GRUP MIDDLEWARE AUTH
require __DIR__.'/auth.php';