<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
     
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::get('/register', 'showRegister')->name('show.register');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::middleware('auth')->controller(ExpenseController::class, CategoryController::class)->group(function () {
    Route::get('/expenses/dashboard', 'dashboard')->name('expenses.dashboard');
    Route::get('/expenses/list', 'index')->name('expenses.list');
    Route::get('/expenses/create', 'create')->name('expenses.create');
    Route::post('/expenses', 'store')->name('expenses.store');
    Route::get('/expenses/{expense}/edit', 'edit')->name('expenses.edit');
    Route::post('/expenses/{expense}', 'update')->name('expenses.update');
    Route::delete('/expenses/{expense}', 'destroy')->name('expenses.delete');
   
});

Route::middleware('auth')->controller(CategoryController::class)->group(function () {
 Route::get('/expenses/category', 'category')->name('expenses.category');
 Route::get('/expenses/category/create', 'showCreate')->name('expenses.createCat');
 Route::post('/expenses/category/create', 'store')->name('expenses.insertCategory');
});

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'show')->name('profile.show');
    Route::post('/profile/{user}', 'update')->name('profile.update');
});