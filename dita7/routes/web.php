<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

/*|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which contains the "web" middleware group. Now create something great!   
*/

Route::get('/', [BlogController::class, 'index'])->name('blog.home');
Route::get('/contact', [BlogController::class, 'create'])->name('blog.contact');
Route::post('/contact', [BlogController::class, 'store'])->name('blog.store');
Route::get('/about', [BlogController::class, 'about'])->name('blog.about');
