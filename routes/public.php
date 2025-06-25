<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// // Berita API (publik)
// Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
// Route::get('/berita/detail', [NewsController::class, 'detail'])->name('berita.detail');