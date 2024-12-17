<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use App\Models\Article;

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

// Route::options('/{any}', function () {
//     return response('', 200)
//         ->header('Access-Control-Allow-Origin', 'http://localhost:5173')
//         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
//         ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
// })->where('any', '.*');


// auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

//testing 
// Route::get('/test', function () {
//     return 'Hello, Laravel is working!';
// });
Route::get('/testing', function () {
    return inertia('Welcome');
});

//404 route
Route::fallback(function () {
    return inertia('notfound');
});
