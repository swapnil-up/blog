<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Models\Article;
use App\Models\Tags;

Route::middleware('auth')->group(function () {
    //articles related
    Route::get('/', [ArticleController::class, 'index'])->name('home');
    Route::get('/about', function () {
        return inertia('Aboutpage');
    });

    Route::get('/articles/create', function () {
        return inertia('Articles/CreateArticle');
    });

    Route::post('/articles', [ArticleController::class, 'store']);

    Route::get('/articles/update', function () {
        return inertia('Articles/UpdateArticle');
    });
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit']);
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

    Route::delete('/articles/{id}', [ArticleController::class, 'delete']);

    Route::get('/articles/{id}', [ArticleController::class, 'show']);

    Route::get('/articles/{id}/comments', [ArticleController::class, 'getComments']);
});

//api routes
Route::get('/api/tags', function () {
    return Tags::all();
});


// auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);

//testing 
Route::get('/test', function () {
    return 'Hello, Laravel is working!';
});
Route::get('/testing', function () {
    return inertia('Welcome');
});

//404 route
Route::fallback(function () {
    return inertia('notfound');
});
