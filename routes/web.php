<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/registration', [AuthController::class, 'showRegistration'])->name('show.registration');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');