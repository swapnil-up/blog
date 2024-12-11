<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/about', function () {
    return inertia('Aboutpage');
});
Route::view('/articles/{id}', 'articles');
Route::get('/test', function () {
    return 'Hello, Laravel is working!';
});
Route::get('/testing', function () {
    return inertia('Welcome');
});
