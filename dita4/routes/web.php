<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;

//Normal Controller
Route::get('/', [PostController::class, 'index'])->name('index');


//CRUD Controller
Route::get('/', [BlogController::class, 'index'])->name('index');

Route::get('/create', [BlogController::class, 'create'])->name('create');

Route::post('/store', [BlogController::class, 'store'])->name('store');

Route::match(['get', 'post'], '/create', [BlogController::class, 'create'])->name('store');

Route::resource('blogs', BlogController::class);