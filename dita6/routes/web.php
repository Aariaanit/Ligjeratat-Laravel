<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;



Route::get('/', [BlogController::class, 'index']);
Route::get('/blog/create', [BlogController::class, 'create']);
Route::post('/blog', [BlogController::class, 'store']);
