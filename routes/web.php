<?php

use App\Http\Controllers\RegisterController;
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
Route::get('/', [RegisterController::class, 'index'])->middleware("guest");
Route::post('/', [RegisterController::class, 'create'])->name('register.user');
Route::get('/login', [RegisterController::class, 'loginView'])->name('login')->middleware("guest");
Route::post('/login', [RegisterController::class, 'login'])->name('login.form');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout')->middleware("auth");
Route::view('/home', "home")->name('home')->middleware("auth");
