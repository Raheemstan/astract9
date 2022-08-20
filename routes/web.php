<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Notifications\NotifyActiveAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [MessageController::class, 'index']);

Auth::routes();

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin//', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/users/', [AdminController::class, 'show'])->name('users');
    Route::get('/admin/users/{id}{action}', [AdminController::class, 'update'])->name('update');
    Route::post('/activate', [AdminController::class, 'send'])->name('activate');

});

Route::group(['middleware' => 'user'], function ()
{
    Route::get('/create', [MessageController::class, 'create'])->name('create');
    Route::post('/read/{id}', [MessageController::class, 'show']);
    Route::post('submit', [MessageController::class, 'store'])->name('submit');
 
});
Route::get('/unverified', function ()
{
    $level = auth()->user()->status;
    if($level === 3){
        return redirect(route('dashboard'));
    }elseif($level === 1){
        return redirect(route('home'));
    }else{
        return view('users.verify');
}
})->name('unverified');

Route::get('/home', [MessageController::class, 'index'])->name('home');
