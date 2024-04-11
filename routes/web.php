<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageAdminController;
use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'welcome'])->name('page.welcome');
Route::get('/legals', [PageController::class, 'legals'])->name('page.legals');
Route::get('/about-us', [PageController::class, 'aboutus'])->name('page.aboutus');

Route::group(['prefix' => '/dashboard'],function () {
    Route::get('/', [PageAdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
    Route::get('/my-posts', [PageAdminController::class, 'myposts'])->middleware(['auth'])->name('admin.myposts');

    Route::get('/post', [AdminPostController::class, 'create'])->middleware(['auth'])->name('admin.posts.create');
    Route::post('/post', [AdminPostController::class, 'store'])->middleware(['auth'])->name('admin.posts.store');

    Route::get('/post/{id}/edit', [AdminPostController::class, 'edit'])->middleware(['auth'])->name('admin.posts.edit');
    Route::put('/post/{id}/edit', [AdminPostController::class, 'update'])->middleware(['auth'])->name('admin.posts.update');
    Route::delete('/post/{id}/edit', [AdminPostController::class, 'destroy'])->middleware(['auth'])->name('admin.posts.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
