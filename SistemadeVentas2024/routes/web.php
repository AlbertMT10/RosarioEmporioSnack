<?php

use App\Livewire\CategoryMain;
use App\Livewire\Dashboard\Main;
use App\Livewire\PhysicalsaleMain;
use App\Livewire\ProductMain;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',Main::class)->name('dashboard');
    Route::get('/categorias', CategoryMain ::class)->name('categorias');
    Route::get('/almacen', ProductMain ::class)->name('almacen');
    Route::get('/carrito', PhysicalsaleMain ::class)->name('carrito');
});
