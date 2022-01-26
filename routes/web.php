<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/edit{id}', [UserController::class, 'edit'])->name('edit');
Route::put('/update{id}', [UserController::class, 'update'])->name('update');
Route::delete('/destroy{id}', [UserController::class, 'destroy'])->name('destroy');
Route::get('/select', [UserController::class, 'select'])->name('select');
