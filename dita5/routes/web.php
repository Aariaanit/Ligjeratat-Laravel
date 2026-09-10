<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


Route::get('/', [BlogController::class, 'index']);

Route::get('/home', function () {
    return view('home', [
        'name' => 'Arianit'
    ]);
});