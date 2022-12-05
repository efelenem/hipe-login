<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
	Route::get('/home', [LoginController::class, 'home'])->name('home');
	Route::get('/users', [UserController::class, 'index'])->name('users');
	Route::post('/create', [UserController::class, 'create'])->name('users.create');
	Route::get('/show/{user?}', [UserController::class, 'show'])->name('users.show');
	Route::post('/update/{user?}', [UserController::class, 'update'])->name('users.update');
	Route::post('/delete/{user?}', [UserController::class, 'delete'])->name('users.delete');
});
