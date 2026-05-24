<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kos', KosController::class);
Route::get('/kos-search', [KosController::class, 'search'])->name('kos.search');

// Route kamar
Route::get('/kos/{kos_id}/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::get('/kos/{kos_id}/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
Route::post('/kos/{kos_id}/kamar', [KamarController::class, 'store'])->name('kamar.store');
Route::get('/kos/{kos_id}/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kos/{kos_id}/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
Route::delete('/kos/{kos_id}/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');