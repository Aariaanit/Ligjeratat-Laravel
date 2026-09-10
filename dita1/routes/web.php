<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});


Route::get('/index', function () {
    return view('Index');
});