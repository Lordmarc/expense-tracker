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

Route::middleware('auth')->controller(ExpenseController::class)->group(function () {
    Route::get('/expenses/dashboard', 'dashboard')->name('expenses.dashboard');
    Route::get('/expenses/list', 'index')->name('expenses.list');
    Route::get('/expenses/create', 'create')->name('expenses.create');
    Route::post('/expenses', 'store')->name('expenses.store');
    Route::get('/expenses/{expense}/edit', 'edit')->name('expenses.edit');
    Route::post('/expenses/{expense}', 'update')->name('expenses.update');
    Route::delete('/expenses/{expense}', 'destroy')->name('expenses.delete');
   
});

Route::middleware('auth')->controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');                   // list categories
    Route::get('/categories/create', 'create')->name('categories.create');          // show create form
    Route::post('/categories', 'store')->name('categories.store');                  // save new category
    Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');     // show edit form
    Route::put('/categories/{category}', 'update')->name('categories.update');      // update category
    Route::delete('/categories/{category}', 'destroy')->name('categories.destroy'); // delete category
});

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'show')->name('profile.show');
    Route::post('/profile/{user}', 'update')->name('profile.update');
});