<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', [PostController::class, 'apiIndex']);
Route::post('/posts', [PostController::class, 'apiStore'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'apiLogin']);
Route::get('/posts/{id}', [PostController::class, 'apiShow']);
Route::put('/posts/{id}', [PostController::class, 'apiUpdate'])->middleware('auth:sanctum');
Route::delete('/posts/{id}', [PostController::class, 'apiDestroy'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'apiLogout'])->middleware('auth:sanctum');


Route::delete('/admin/posts/{id}', [PostController::class, 'apiAdminDestroy'])
    ->middleware(['auth:sanctum', 'admin']);