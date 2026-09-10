<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

Route::get('/',[TodosController::class, 'index'])->name('todos');

Route::get('create',[TodosController::class, 'create'])->name('create');

Route::resource('todos', TodosController::class);