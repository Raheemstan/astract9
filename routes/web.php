<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [MessageController::class, 'create'])->name('create');
Route::post('/read-msg/{id}', [MessageController::class, 'show']);
Route::post('submit', [MessageController::class, 'store'])->name('submit');

Auth::routes();

Route::get('/dashboard', [MessageController::class, 'index'])->name('home');
