<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

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
Route::get('/articles/{id}/edit',[ArticleController::class, 'edit']);
Route::put('/articles/{id}',[ArticleController::class, 'update'])->name('articles.update');

Route::delete('/articles/{id}',[ArticleController::class,'delete']);

Route::get('/articles/{id}', function ($id) {

    $article = Article::find($id);
    return inertia('Articles/ShowArticle', [
        'article' => $article
    ]);
});

Route::get('/test', function () {
    return 'Hello, Laravel is working!';
});
Route::get('/testing', function () {
    return inertia('Welcome');
});
