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

    // --- Kuis Budaya (Misi & Peringkat sudah menyatu di sini) ---
    Route::controller(KuisController::class)->group(function () {
        Route::get('/kuis', 'index')->name('kuis.index');
        Route::post('/kuis', 'submit')
            ->middleware('throttle:10,1') // max 10 submit/menit, cegah spam
            ->name('kuis.submit');
        Route::get('/kuis/hasil', 'hasil')->name('kuis.hasil');
    });

    // --- Peta dan Informasi Budaya ---
    Route::controller(BudayaController::class)->group(function () {
        Route::get('/budaya', 'index')->name('budaya.index');
        Route::get('/budaya/{nama}', 'show')
            ->where('nama', '[A-Za-z\-]+')
            ->name('budaya.show');
    });

    // --- Kustomisasi Avatar ---
    Route::controller(AvatarController::class)->group(function () {
        Route::get('/avatar', 'index')->name('avatar.index');
        Route::get('/avatar/kostumisasi', 'kostumisasi')->name('avatar.kostumisasi');
        Route::post('/avatar/update', 'update')->name('avatar.update');
        Route::post('/avatar/beli', 'beli')->name('avatar.beli');
    });

    require __DIR__.'/auth.php';
});