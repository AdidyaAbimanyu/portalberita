<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [PenggunaController::class, 'index'])->name('home');
Route::get('/authlogin', [PenggunaController::class, 'ShowLoginForm'])->name('ShowLogin');
Route::get('/authregister', [PenggunaController::class, 'ShowRegisForm'])->name('ShowRegis');
Route::post('/login', [PenggunaController::class, 'login'])->name('login');
Route::post('/register', [PenggunaController::class, 'register'])->name('register');
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');

Route::get('/cari', [PenggunaController::class, 'cari'])->name('cari');
Route::get('/berita/{id}', [PenggunaController::class, 'showBerita'])->name('berita.show');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/admin/berita/form', [AdminController::class, 'form'])->name('form');
    Route::post('/admin/berita/store', [AdminController::class, 'addBerita'])->name('berita.store');

    Route::get('/admin/berita/{id}/edit', [AdminController::class, 'edit'])->name('berita.edit');
    Route::put('/admin/berita/{id}', [AdminController::class, 'update'])->name('berita.update');

    Route::delete('/admin/berita/{id}', [AdminController::class, 'destroy'])->name('berita.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/berita/{id}/komentar', [PenggunaController::class, 'addKomentar'])->name('komentar.store');
    Route::delete('/komentar/{id}', [PenggunaController::class, 'deleteKomentar'])->name('komentar.destroy');
});
