<?php

use App\Http\Controllers\{HomeController, DokterController, JadwalController, LoginController, LogoutController, PoliController, RegisterController};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard','dashboard')->name('dashboard');
    Route::view('master','master.index')->name('master');

    // Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('logout', LogoutController::class)->name('logout');

    // poli
    Route::get('poli', [PoliController::class, 'index'])->name('poli');
    Route::get('poli/create', [PoliController::class, 'create'])->name('poli.create');
    Route::get('poli/{id}/edit', [PoliController::class, 'edit'])->name('poli.edit');
    Route::post('poli', [PoliController::class, 'store']);
    Route::put('poli/{id}', [PoliController::class, 'update'])->name('poli.update');
    Route::delete('poli/{id}', [PoliController::class, 'destroy'])->name('poli.delete');

    // dokter
    Route::get('dokter', [DokterController::class, 'index'])->name('dokter');
    Route::get('dokter/create', [DokterController::class, 'create'])->name('dokter.create');
    Route::get('dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::post('dokter', [DokterController::class, 'store']);
    Route::put('dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
    Route::delete('dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.delete');

    // jadwal
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::get('jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('jadwal', [JadwalController::class, 'store']);
    Route::put('jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.delete');
    //
    Route::get('jadwal/getDokter/{id}', [JadwalController::class, 'getDokter'])->name('jadwal.getDokter');
    Route::get('getDokterEdit/{id}', [JadwalController::class, 'getDokter']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});
