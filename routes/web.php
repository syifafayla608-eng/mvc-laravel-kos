<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kos', KosController::class);
Route::get('/kos-search', [KosController::class, 'search'])->name('kos.search');