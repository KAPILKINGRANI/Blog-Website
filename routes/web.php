<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('blogs.index');

Route::resource('tags', TagsController::class)->except(['show']);
Route::resource('categories', CategoriesController::class)->except(['show']);

Route::get('/categories/{category}', [FrontendController::class, 'category'])->name('blogs.category');
Route::get('/tags/{tag}', [FrontendController::class, 'tag'])->name('blogs.tag');

Route::get('/blogs/{post}', [FrontendController::class, 'show'])->name('blogs.show');

Route::resource('posts', PostsController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
