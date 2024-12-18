<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use App\Models\Tags;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

// Route::post('/login', [AuthController::class, 'login']);

Route::middleware('web')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::post('/register', [AuthController::class, 'register']);

// middleware('auth:sanctum')->
Route::get('/notes', [NotesController::class, 'index']);
Route::middleware('auth:sanctum')->post('/notes', [NotesController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/notes/{id}', [NotesController::class, 'destroy']);
Route::middleware('auth:sanctum')->patch('/notes/{id}', [NotesController::class, 'update']);

Route::get('/api/tags', function () {
    return Tags::all();
});
