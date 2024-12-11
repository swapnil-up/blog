<?php

use Illuminate\Support\Facades\Route;

Route::view('/','homepage');
Route::view('/about','about');
Route::view('/articles/{id}','articles');
Route::get('/test',function(){
    return 'Hello, Laravel is working!';
});