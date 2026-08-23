<?php

use App\Http\Controllers\LugarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LugarController::class, 'index'])->name('lugares.index');
Route::get('/lugar/{id}', [LugarController::class, 'show'])->name('lugares.show');
Route::post('/contacto', [LugarController::class, 'contactar'])->name('lugares.contacto');
