<?php

use App\Livewire\CategoryMain;
use App\Livewire\Dashboard\Main;
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
});
