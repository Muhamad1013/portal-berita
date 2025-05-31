<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Api\CategoryApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita mendefinisikan semua route untuk aplikasi web.
| Termasuk route publik, user, dan admin.
|
*/

// Beranda utama (public)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard umum (untuk user login & verifikasi email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk profile user (hanya setelah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Redirect otomatis berdasarkan role setelah login
Route::get('/redirect', function () {
    $role = auth()->user()->role;
    return match ($role) {
        'admin' => redirect('/admin/dashboard'),
        'user' => redirect('/beranda'),
        default => abort(403, 'Role tidak dikenali.'),
    };
})->middleware(['auth'])->name('redirect');

// Halaman beranda untuk user biasa
Route::get('/beranda', [UserController::class, 'beranda'])->middleware(['auth'])->name('beranda');

// Halaman dashboard admin (lama, bisa dihapus jika pakai prefix admin)
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

// admin status update
Route::post('/admin/status-update', function (\Illuminate\Http\Request $request) {
    $request->validate(['status' => 'required|in:active,dnd,idle']);
    session(['user_status' => $request->status]);
    return back();
})->name('admin.status.update')->middleware('auth', 'is_admin');



// ==========================
// 🔒 Route Admin (CMS Berita)
// ==========================
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    // Halaman dashboard admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CRUD berita
    Route::get('news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('news', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/{id}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::get('admin/news/{id}', [AdminNewsController::class, 'show'])->name('admin.news.show');
    Route::put('news/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('news/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');





    Route::resource('kategori', CategoryController::class)->names('admin.kategori');
});


// Route auth bawaan Laravel Breeze/Fortify
require __DIR__ . '/auth.php';