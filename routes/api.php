<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::post('/mascota/add', [\App\Http\Controllers\MascotaController::class, 'add'])
    ->middleware('auth:sanctum');

Route::get('/mascota/list', [\App\Http\Controllers\MascotaController::class, 'list'])
    ->middleware('auth:sanctum');

Route::get('/mascota/{id}', [\App\Http\Controllers\MascotaController::class, 'search'])
    ->middleware('auth:sanctum');
