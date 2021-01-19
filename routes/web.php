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
    Route::get('/requests',[\App\Http\Controllers\AdminController::class, 'requests']);
    Route::get('violation/sphere/create', [\App\Http\Controllers\ViolationSphereController::class, 'create']);
    Route::post('violation/sphere', [\App\Http\Controllers\ViolationSphereController::class, 'store']);
    Route::get('violation/sphere', [\App\Http\Controllers\ViolationSphereController::class, 'index']);


    Route::get('violation/type/create', [\App\Http\Controllers\ViolationTypeController::class, 'create']);
    Route::post('violation/type', [\App\Http\Controllers\ViolationTypeController::class, 'store']);
    Route::get('violation/type', [\App\Http\Controllers\ViolationTypeController::class, 'index']);
    Route::get('violation/type/{violationType}', [\App\Http\Controllers\ViolationTypeController::class, 'show']);


    Route::get('violation/type/{violationType}/checkbox/create', [\App\Http\Controllers\RequestCheckboxController::class, 'create']);
    Route::post('violation/type/checkbox', [\App\Http\Controllers\RequestCheckboxController::class, 'store']);
    Route::resource('user', UserController::class);
});
//Route::post('/loging/submit', function () {
//    return view('welcome');
//})->name('logging-form');


Route::get('login', [\App\Http\Controllers\AuthController::class, 'create'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'store']);
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/', [\App\Http\Controllers\RequestController::class, 'index'])->name('requests');
Route::resource('request', \App\Http\Controllers\RequestController::class)->except(['index']);

Route::get('violation/type/{violationType}/checkboxes', [\App\Http\Controllers\RequestCheckboxController::class, 'get']);

Route::get('violation/sphere/{violationSphere}/types', [\App\Http\Controllers\ViolationTypeController::class, 'sphereTypes']);
Route::get('violation/spheres/', [\App\Http\Controllers\ViolationSphereController::class, 'spheres']);
Route::get('about', [\App\Http\Controllers\StaticPageController::class, 'about']);

Route::get('registration', [\App\Http\Controllers\StaticPageController::class, 'registration']);

Route::get('region/{regionId}/districts', [\App\Http\Controllers\AddressController::class, 'districts']);
Route::get('district/{districtId}/settlements', [\App\Http\Controllers\AddressController::class, 'settlements']);
Route::get('regions', [\App\Http\Controllers\AddressController::class, 'regions']);

Route::get('profile', [UserController::class, 'profile'])->middleware('auth');
