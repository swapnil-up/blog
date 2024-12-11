<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::view('/', 'homepage');
Route::view('/about', 'about');
Route::view('/articles/{id}', 'articles');
Route::get('/test', function () {
    return 'Hello, Laravel is working!';
});
Route::get('/testing', function () {
    return inertia('Welcome');
});
