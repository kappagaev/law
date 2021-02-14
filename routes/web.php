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
    Route::get('/requests/approve',[\App\Http\Controllers\AdminController::class, 'requestsApprove']);
    Route::get('/request/{request}',[\App\Http\Controllers\AdminController::class, 'request']);
    Route::get('/request/{request}/disprove',[\App\Http\Controllers\AdminController::class, 'requestDisprove']);
    Route::get('/request/{request}/approve',[\App\Http\Controllers\AdminController::class, 'requestApprove']);


    Route::get('violation/sphere/create', [\App\Http\Controllers\ViolationSphereController::class, 'create']);
    Route::post('violation/sphere', [\App\Http\Controllers\ViolationSphereController::class, 'store']);
    Route::get('violation/sphere', [\App\Http\Controllers\ViolationSphereController::class, 'index']);
    Route::get('/registrations',[\App\Http\Controllers\AdminController::class, 'userRegistrations']);
    Route::get('/registration/{registration}',[\App\Http\Controllers\AdminController::class, 'userRegistration']);
    Route::get('/registration/{registration}/prove',[\App\Http\Controllers\AdminController::class, 'userRegistrationProve']);
    Route::get('/registration/{registration}/disprove',[\App\Http\Controllers\AdminController::class, 'userRegistrationDisprove']);

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


//Route::get('login', [\App\Http\Controllers\AuthController::class, 'create'])->name('login');

Route::get('/', [\App\Http\Controllers\RequestController::class, 'index'])->name('requests');
Route::resource('request', \App\Http\Controllers\RequestController::class)->except(['index']);

Route::get('violation/type/{violationType}/checkboxes', [\App\Http\Controllers\RequestCheckboxController::class, 'get']);

Route::get('violation/sphere/{violationSphere}/types', [\App\Http\Controllers\ViolationTypeController::class, 'sphereTypes']);
Route::get('violation/spheres/', [\App\Http\Controllers\ViolationSphereController::class, 'spheres']);

Route::get('about', [\App\Http\Controllers\StaticPageController::class, 'about']);
Route::get('rules', [\App\Http\Controllers\StaticPageController::class, 'rules']);
Route::get('donate', [\App\Http\Controllers\StaticPageController::class, 'donate']);

//Route::get('registration', [\App\Http\Controllers\UserRegistrationController::class, 'create']);
Route::middleware('guest')->group(function () {

});
Route::get('auth/office365/redirect', [\App\Http\Controllers\AuthController::class, 'redirectToProvider']);

//Route::post('login', [\App\Http\Controllers\AuthController::class, 'store']);
Route::get('auth/office365', [\App\Http\Controllers\AuthController::class, 'handleProviderCallback']);

Route::get('registration/office365/{registration:key}', [\App\Http\Controllers\AzureRegistrationController::class, 'confirmForm']);
Route::post('registration/office365/{registration:key}', [\App\Http\Controllers\AzureRegistrationController::class, 'confirm']);

Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
//
//Route::post('registration', [\App\Http\Controllers\UserRegistrationController::class, 'store']);
//Route::get('registration/{registration:key}', [\App\Http\Controllers\UserRegistrationController::class, 'confirmForm']);
//Route::post('registration/{registration:key}', [\App\Http\Controllers\UserRegistrationController::class, 'confirm']);

Route::get('feedback', [\App\Http\Controllers\FeedbackController::class, 'create']);
Route::post('feedback', [\App\Http\Controllers\FeedbackController::class, 'store']);

Route::get('territory/', [\App\Http\Controllers\TerritoryController::class, 'index']);
Route::get('territory/{territoryId}/children', [\App\Http\Controllers\TerritoryController::class, 'children']);
Route::get('territory/{territory}/similar', [\App\Http\Controllers\TerritoryController::class, 'territoriesWithSimilarNameParents']);

Route::get('profile', [UserController::class, 'profile'])->middleware('auth');


