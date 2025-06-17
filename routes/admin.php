<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminCategoryController;

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
  Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

  // News CRUD
  Route::resource('news', AdminNewsController::class)->except('show');
  Route::get('news', [AdminNewsController::class, 'index'])->name('admin.news.index');
  Route::get('news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
  Route::post('news', [AdminNewsController::class, 'store'])->name('admin.news.store');
  Route::get('news/{id}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
  Route::get('admin/news/{id}', [AdminNewsController::class, 'show'])->name('admin.news.show');
  Route::put('news/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
  Route::delete('news/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');


  // Categories CRUD
  Route::resource('categories', AdminCategoryController::class)->except(['show']);
  Route::get('categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
  Route::get('categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
  Route::post('categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
  Route::get('categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
  Route::put('categories/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
  Route::delete('categories/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

// Admin Status
Route::post('/admin/status-update', function (\Illuminate\Http\Request $request) {
  $request->validate(['status' => 'required|in:active,dnd,idle']);
  session(['user_status' => $request->status]);
  return back();
})->middleware(['auth', 'is_admin'])->name('admin.status.update');