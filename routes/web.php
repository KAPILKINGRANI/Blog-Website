<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('blogs.index');
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin-panel.dashboard');
    })->name('dashboard');
    
    Route::resource('tags', TagsController::class)->except(['show']);
    Route::resource('categories', CategoriesController::class)->except(['show']);

    Route::resource('posts', PostsController::class);
    Route::put('posts/{post}/publish-now', [PostsController::class, 'publish'])->name('posts.publish');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/categories/{category}', [FrontendController::class, 'category'])->name('blogs.category');
Route::get('/tags/{tag}', [FrontendController::class, 'tag'])->name('blogs.tag');

Route::get('/blogs/{post}', [FrontendController::class, 'show'])->name('blogs.show');



require __DIR__ . '/auth.php';
