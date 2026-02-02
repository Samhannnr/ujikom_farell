<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaDidikController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('peserta-didik', PesertaDidikController::class);
Route::resource('tahun-ajar', TahunAjarController::class);
Route::resource('rombongan-belajar', RombonganBelajarController::class);
Route::resource('anggota-rombel', AnggotaRombelController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('konsekuensi-telat', KonsekuensiTelatController::class);
Route::resource('qr-codes', QrCodeController::class);
