<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/**
 * Route Home
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Route get Austrian active Users
 */
Route::get('users/{filter?}', [TestController::class, 'getUsers'])->name('austrian.index');

/**
 * Route get Countrie
 */
Route::get('countries', [TestController::class, 'getCountries'])->name('countries.index');

/**
 * Route update user detail
 */
Route::put('users/{id}', [TestController::class, 'updateUserDetail'])->name('user.update');

/**
 * Route delete user
 */
Route::delete('users/{id}', [TestController::class, 'deleteUser'])->name('user.delete');
