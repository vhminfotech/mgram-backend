<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ApnParametersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
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


Route::get('clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode1 = Artisan::call('route:clear');
    $exitCode2 = Artisan::call('config:clear');
    $exitCode3 = Artisan::call('view:clear');
    return '<h1>cache route config view cleared</h1>';
});


Route::get('/', [IndexController::class, 'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/apnlist', [ApnParametersController::class, 'ApnListIndex']);
    Route::get('/editapn', [ApnParametersController::class, 'editApnForm']);
    Route::post('/editapn', [ApnParametersController::class, 'editApn']);
    
});

