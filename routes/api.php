<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::controller(AuthenticationController::class)->prefix('auth')->group(function () {

    Route::post('login', 'index')->name('login');

    Route::delete('logout', 'logout')
        ->middleware('auth:api')
        ->name('logout');

});

Route::controller(UserController::class)->prefix('user')->group(function () {

    Route::get('/', 'index')
        ->middleware('auth:api')
        ->name('users.index');

    Route::post('/', 'store')
        ->middleware('auth:api')
        ->name('users.store');

    Route::get('/{userId}', 'show')
        ->middleware('auth:api')
        ->name('users.show');

    Route::put('/{userId}', 'update')
        ->middleware('auth:api')
        ->name('users.update');

    Route::delete('/{userId}', 'destroy')
        ->middleware('auth:api')
        ->name('users.destroy');

});
