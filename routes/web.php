<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/dokter', function () {
    return view('list-dokter');
});

Route::get('/obat', function () {
    return view('list-obat');
});

Route::get('/periksa', function () {
    return view('list-periksa');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/obat', [ObatController::class, 'index']);
Route::get('/obat/create', [ObatController::class, 'create']);
Route::post('/obat', [ObatController::class, 'store']);
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');


Route::get('/login', [AuthController::class, 'form'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
});