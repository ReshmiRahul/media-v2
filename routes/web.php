<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MediaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/media', [MediaController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('about');
