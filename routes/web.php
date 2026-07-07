<?php

use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, 'index'])->name('chirps.index');
Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');