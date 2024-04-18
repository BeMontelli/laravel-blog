<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageAdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'welcome'])->name('page.welcome');
Route::get('/legals', [PageController::class, 'legals'])->name('page.legals');
Route::get('/about-us', [PageController::class, 'aboutus'])->name('page.aboutus');

Route::get('/blog', [PostController::class, 'index'])->name('page.blog');
Route::get('/blog/category/{category}', [PostController::class, 'category'])->name('page.blog.category');
Route::get('/blog/post/{post}', [PostController::class, 'show'])->name('page.blog.single');

Route::group(['prefix' => '/dashboard'],function () {
    //DASHBOARD
    Route::get('/', [PageAdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

    // POSTS BO
    Route::get('/my-posts', [PageAdminController::class, 'myposts'])->middleware(['auth'])->name('admin.myposts');

    Route::get('/post/{id}', [AdminPostController::class, 'show'])->middleware(['auth'])->name('admin.posts.show');

    Route::get('/post-create', [AdminPostController::class, 'create'])->middleware(['auth'])->name('admin.posts.create');
    Route::post('/post-create', [AdminPostController::class, 'store'])->middleware(['auth'])->name('admin.posts.store');

    Route::get('/post/{id}/edit', [AdminPostController::class, 'edit'])->middleware(['auth'])->name('admin.posts.edit');
    Route::put('/post/{id}/edit', [AdminPostController::class, 'update'])->middleware(['auth'])->name('admin.posts.update');
    Route::delete('/post/{id}/edit', [AdminPostController::class, 'destroy'])->middleware(['auth'])->name('admin.posts.destroy');

    Route::group([ 'middleware' => ['isAdmin'] ], function () {

        // CATEGORIES BO
        Route::get('/categories', [AdminCategoryController::class, 'index'])->middleware(['auth'])->name('admin.categories.index');

        Route::get('/category/{id}', [AdminCategoryController::class, 'show'])->middleware(['auth'])->name('admin.categories.show');

        Route::get('/category-create', [AdminCategoryController::class, 'create'])->middleware(['auth'])->name('admin.categories.create');
        Route::post('/category-create', [AdminCategoryController::class, 'store'])->middleware(['auth'])->name('admin.categories.store');

        Route::get('/category/{id}/edit', [AdminCategoryController::class, 'edit'])->middleware(['auth'])->name('admin.categories.edit');
        Route::put('/category/{id}/edit', [AdminCategoryController::class, 'update'])->middleware(['auth'])->name('admin.categories.update');
        Route::delete('/category/{id}/edit', [AdminCategoryController::class, 'destroy'])->middleware(['auth'])->name('admin.categories.destroy');

        // USERS BO
        Route::get('/users', [AdminUserController::class, 'index'])->middleware(['auth'])->name('admin.users.index');

        Route::get('/user/{id}', [AdminUserController::class, 'show'])->middleware(['auth'])->name('admin.users.show');

        Route::get('/user/{id}/edit', [AdminUserController::class, 'edit'])->middleware(['auth'])->name('admin.users.edit');
        Route::put('/user/{id}/edit', [AdminUserController::class, 'update'])->middleware(['auth'])->name('admin.users.update');
        Route::delete('/user/{id}/edit', [AdminUserController::class, 'destroy'])->middleware(['auth'])->name('admin.users.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
