<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/masuk', function () {
    return view('auth.masuk');
});

Route::get('/daftar', function () {
    return view('auth.daftar');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/form', function () {
    return view('admin.form');
});
