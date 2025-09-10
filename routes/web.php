<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
     
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::get('/register', 'showRegister')->name('show.register');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::middleware('auth')->controller(ExpenseController::class)->group(function () {
    Route::get('/expenses/dashboard', 'dashboard')->name('expenses.dashboard');
    Route::get('/expenses/list', 'index')->name('expenses.list');
    Route::get('/expenses/create', 'create')->name('expenses.create');
    Route::post('/expenses', 'store')->name('expenses.store');
    Route::get('/expenses/{expense}/edit', 'edit')->name('expenses.edit');
    Route::post('/expenses/{expense}', 'update')->name('expenses.update');
    Route::delete('/expenses/{expense}', 'destroy')->name('expenses.delete');
});