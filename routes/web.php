<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Vacunas;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/mis-mascotas', function () {
    return view('mascotas');
})->middleware('auth')->name('mis-mascotas');

Route::get('/ver-cartilla/{id}', function ($id) {
    return view('ver-cartilla', ['id' => $id]);
})->middleware('auth')->name('ver-cartilla');

Route::get('/mascota-virtual', function () {
    return view('mascota-virtual');
})->middleware('auth')->name('mascota-virtual');

Route::get('/agregarmascota', function () {
    return view('agregarmascota');
})->name('agregarmascota');

Route::get('/ver-mascotas/{id}', function ($id) {
    return view('ver-mascotas', ['id' => $id]);
})->middleware('auth')->name('ver-mascotas');

Route::get('/gestionar-usuarios', function () {
    return view('gestionar-usuarios');
})->name('gestionar-usuarios');

Route::get('/gestionar-mascotas', function () {
    return view('gestionar-mascotas');
})->name('gestionar-mascotas');

Route::get('/mis-clientes', function () {
    return view('mis-clientes');
})->name('mis-clientes');
