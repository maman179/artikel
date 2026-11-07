<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Blog;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\Contact;
use App\Http\Controllers\About;

Route::get('/', [Homepage::class, 'index'])->name('homepage');

Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store');

Route::middleware('CekLogin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'posts' => Post::where('author_id', auth()->user()->id)->get()
        ]);
    })->name('dashboard');

    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/dashboard/posts', DashboardPostController::class);

    Route::resource('/dashboard/categories', AdminCategoryController::class)
        ->except('show');

    Route::get('/posts', [Blog::class, 'index'])->name('posts');
    Route::get('/posts/{post:slug}', [Blog::class, 'show'])->name('post');

    Route::get('/authors/{user:username}', [Blog::class, 'posts'])->name('posts_author');

    Route::get('/categories/{category:slug}', [Blog::class, 'Categories'])->name('categories');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/contact', [Contact::class, 'index'])->name('contact');

    Route::get('/about', [About::class, 'index'])->name('about');
});
