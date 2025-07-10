<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowProfileController;

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/beranda', [UserController::class, 'beranda'])->name('beranda');
    Route::get('/beranda/kategori/{categoryId}', [UserController::class, 'filterByCategory'])->name('user.beranda.kategori');
    Route::get('/berita/{id}', [UserController::class, 'show'])->name('berita.show');

    Route::get('/search', [UserController::class, 'search'])->name('user.search');

    Route::post('/berita/{id}/komentar', [UserController::class, 'storeComment'])->name('user.comment.store');
    Route::post('/komentar/{id}/reply', [UserController::class, 'replyComment'])->name('user.comment.reply');
    Route::delete('/komentar/{id}', [UserController::class, 'deleteComment'])->name('user.comment.delete');
    Route::post('/komentar/{id}/react', [UserController::class, 'reactComment'])->name('user.comment.react');

    Route::get('/user/{id}', [ShowProfileController::class, 'show'])->name('user.profile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update.custom');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Halaman notice verifikasi email
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
});

// ✅ Verifikasi Email (di luar middleware role:user)
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/beranda');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
