<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


//
//Route::get('/logging', function () {
//    return view('layouts/logging');
//});


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
});
//Route::post('/loging/submit', function () {
//    return view('welcome');
//})->name('logging-form');

Route::resource('user', UserController::class);
Route::get('login', [\App\Http\Controllers\AuthController::class, 'create']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'store']);
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/', [\App\Http\Controllers\RequestController::class, 'index']);
Route::resource('request', \App\Http\Controllers\RequestController::class)->except(['index']);

