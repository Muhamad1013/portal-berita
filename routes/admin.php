<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProfileController;

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/profile', [AdminProfileController::class, 'show'])->name('admin.profile.show');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('/profile/password', [AdminProfileController::class, 'editPassword'])->name('admin.profile.password');
    Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.password.update');




    // News CRUD
    Route::resource('news', AdminNewsController::class)->except('show');
    Route::get('news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('news', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/{id}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::get('news/{id}', [AdminNewsController::class, 'show'])->name('admin.news.show');
    Route::put('news/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('news/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');
    Route::get('news/export', [AdminNewsController::class, 'export'])->name('admin.news.export');



    // Categories CRUD
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
    Route::get('categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('categories/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('categories/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('categories/export', [AdminCategoryController::class, 'export'])->name('admin.categories.export');


    // User CRUD
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/users/export', [AdminUserController::class, 'export'])->name('admin.users.export');
});

// Admin Status
Route::post('/admin/status-update', function (\Illuminate\Http\Request $request) {
    $request->validate(['status' => 'required|in:active,dnd,idle']);
    session(['user_status' => $request->status]);
    return back();
})->middleware(['auth', 'is_admin'])->name('admin.status.update');