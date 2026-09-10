
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', [ApiController::class, 'index'])->name('crypto');
Route::get('/users', [ApiController::class, 'users'])->name('users');
Route::get('/products', [ApiController::class, 'products'])->name('products');