<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('show.login');
    Route::get('/register', 'showRegister')->name('show.register');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::middleware('auth')->controller(ExpenseController::class)->group(function () {
    Route::get('/expenses', 'index')->name('expenses.index');
    Route::get('/expenses/create', 'create')->name('expenses.create');
    Route::post('/expenses', 'store')->name('expenses.store');
    Route::get('/expenses/{expense}/edit', 'edit')->name('expenses.edit');
    Route::post('/expenses/{expense}/edit', 'update')->name('expenses.update');
    Route::post('/expenses/{expense}', 'destroy')->name('expenses.delete');
});