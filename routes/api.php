<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/data', [ApiController::class, 'getData']);

Route::get('/music', [ApiController::class, 'getMusic']);
Route::post('/store-music', [ApiController::class, 'storeMusic'])->middleware(IsAdmin::class, 'auth:sanctum');
Route::post('/update-music/{id}', [ApiController::class, 'updateMusic'])->middleware(IsAdmin::class, 'auth:sanctum');
Route::post('/delete-music/{id}', [ApiController::class, 'deleteMusic'])->middleware(IsAdmin::class, 'auth:sanctum');

Route::get('/artist', [ApiController::class, 'getArtist']);
Route::post('/store-artist', [ApiController::class, 'storeArtist'])->middleware(IsAdmin::class, 'auth:sanctum');
Route::post('/update-artist/{id}', [ApiController::class, 'updateArtist'])->middleware(IsAdmin::class, 'auth:sanctum');
Route::post('/delete-artist/{id}', [ApiController::class, 'deleteArtist'])->middleware(IsAdmin::class, 'auth:sanctum');

Route::get('/category', [ApiController::class, 'getCategory']);
Route::post('/store-category', [ApiController::class, 'storeCategory'])->middleware(IsAdmin::class, 'auth:sanctum');
Route::post('/update-category/{id}', [ApiController::class, 'updateCategory'])->middleware(IsAdmin::class, 'auth:sanctum');
Route::post('/delete-category/{id}', [ApiController::class, 'deleteCategory'])->middleware(IsAdmin::class, 'auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');