<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin-panel.dashboard');
    })->name('dashboard');


    Route::resource('/tags', TagsController::class)->except('show');
    Route::resource('/categories', CategoriesController::class)->except('show');
    Route::resource('/users', UsersController::class)->except('show');

    Route::put('/users/{user}/makeAdmin', [UsersController::class, 'makeAdmin'])->name('users.makeAdmin');
    Route::put('/users/{user}/revokeAdmin', [UsersController::class, 'revokeAdmin'])->name('users.revokeAdmin');

    Route::put('post/{comment}/approveComment', [FrontendController::class, 'approveComment'])->name('post.approveComment');
    Route::delete('post/{comment}/deleteComment', [FrontendController::class, 'deleteComment'])->name('post.deleteComment');




    Route::get('/comments', [FrontendController::class, 'displayComments'])->name('comments.display');
    Route::post('/comments/{post}/store', [FrontendController::class, 'storeComment'])->name('comments.store');
    Route::post('/comments/{comment}/posts/{post}/store', [FrontendController::class, 'storeCommentReply'])->name('reply.store');


    Route::get('/posts/trashed', [PostsController::class, 'trashed'])->name('posts.trashed');
    // This should be written above /posts/{post} because posts resource route also has the route which is of same url as mentioned above nahi toh neeche /posts/{post} mai as a placeholder banke chala jayega

    Route::resource('/posts', PostsController::class);

    Route::put('/posts/{post}/publish-now', [PostsController::class, 'publish'])->name('posts.publish');

    Route::put('/posts/trashed/{post}/restore', [PostsController::class, 'restore'])->name('posts.restore');
    Route::delete('/posts/trashed/{post}/destroy', [PostsController::class, 'forceDelete'])->name('posts.forceDelete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [FrontendController::class, 'index'])->name('blogs.index');
Route::get('/categories/{category}', [FrontendController::class, 'category'])->name('blogs.category');
Route::get('/tags/{tag}', [FrontendController::class, 'tag'])->name('blogs.tag');
Route::get('/blogs/{post}', [FrontendController::class, 'show'])->name('blogs.show');

require __DIR__ . '/auth.php';
