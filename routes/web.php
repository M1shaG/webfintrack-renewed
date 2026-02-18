<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', [IndexController::class, 'showIndex'])->name('index');
Route::get('/profile', [IndexController::class, 'showProfile'])->middleware('auth')->name('show.profile');
Route::get('/registration', [AuthController::class, 'showRegistration'])->name('show.registration');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/finance', [IndexController::class, 'add'])->name('finance');
Route::post('/delete/{id}', [IndexController::class, 'delete'])->name('delete');