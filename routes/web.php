<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DetailBukuController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LogVisitorNonAdmin; // Import Middleware Pencatatan Pengunjung
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBukuController;
use App\Http\Controllers\AdminForumDiskusiController;
use App\Http\Controllers\PengaturanAkunController;

// Rute untuk halaman dashboard admin
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.pages.dashboard');
    Route::get('/admin-buku', [AdminBukuController::class, 'index'])->name('admin.pages.buku');
    Route::post('/admin/buku/{id}/update', [AdminBukuController::class, 'update'])->name('admin.buku.update');
    Route::get('/admin-buku/tambah', [AdminBukuController::class, 'create'])->name('admin.buku.create');
    Route::post('/admin/buku/store', [AdminBukuController::class, 'store'])->name('admin.buku.store');
    Route::get('/admin-buku/{id}/edit', [AdminBukuController::class, 'edit'])->name('admin.buku.edit');
    Route::delete('/admin-buku/{id}', [AdminBukuController::class, 'destroy'])->name('admin.buku.destroy');
    Route::get('/admin-forum-diskusi', [AdminForumDiskusiController::class, 'index'])->name('admin.pages.forum-diskusi');
    Route::post('/forum/update-jawaban/{id}', [AdminForumDiskusiController::class, 'updateJawabanDanStatus'])->name('forum.updateJawabanDanStatus');
    Route::patch('/forum-diskusi/{id}/update-answer', [AdminForumDiskusiController::class, 'updateAnswer'])->name('forum-diskusi.update-answer');
    Route::delete('/forum-diskusi/{id}', [AdminForumDiskusiController::class, 'destroy'])->name('forum-diskusi.destroy');
    Route::get('/admin-pengaturan-akun', [PengaturanAkunController::class, 'index'])->name('admin.pages.pengaturan-akun');
});

// Rute umum untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk redirect ke Google
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');

// Rute untuk menangani callback dari Google
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/masuk', [MasukController::class, 'index'])->name('masuk');

// Rute dengan middleware LogVisitorNonAdmin untuk pencatatan pengunjung di halaman umum
Route::middleware([LogVisitorNonAdmin::class])->group(function () {
    Route::get('/', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
    Route::get('/forum-diskusi', [ForumDiskusiController::class, 'index'])->name('forum-diskusi');
    Route::get('/tanya-admin', [ForumDiskusiController::class, 'add'])->name('forum-diskusi-tanya');
    Route::post('/forum-diskusi', [ForumDiskusiController::class, 'store'])->name('forum-diskusi.store');
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
    Route::get('/detail-buku/{id}', [DetailBukuController::class, 'index'])->name('detail-buku');
});
