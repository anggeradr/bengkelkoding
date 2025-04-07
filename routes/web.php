<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

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