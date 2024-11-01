<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DetailBukuController;
use App\Http\Controllers\MasukController;

Route::get('/masuk', [MasukController::class, 'index'])->name('masuk');

// Rute untuk halaman utama
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Rute untuk halaman tentang kami
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

// Rute untuk halaman forum diskusi
Route::get('/forum-diskusi', [ForumDiskusiController::class, 'index'])->name('forum-diskusi');

// Rute untuk halaman forum diskusi (tambah pertanyaan)
Route::get('/tanya-admin', [ForumDiskusiController::class, 'add'])->name('forum-diskusi');

// Rute untuk halaman kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::get('/detail-buku/{id}', [DetailBukuController::class, 'index'])->name('detail-buku');
