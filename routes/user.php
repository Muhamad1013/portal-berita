<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth', 'role:user'])->group(function () {
  Route::get('/beranda', [UserController::class, 'beranda'])->name('beranda');
  Route::get('/beranda/kategori/{categoryId}', [UserController::class, 'filterByCategory'])
    ->name('user.beranda.kategori');
  Route::get('/berita/{id}', [UserController::class, 'show'])->name('berita.show');


  // Profil
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});