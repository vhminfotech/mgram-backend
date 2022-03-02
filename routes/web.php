<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ApnParametersController;
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

Route::get('/', function () {
    return view('welcome');
});


//Operators 
Route::get('operators',[ OperatorController::class, 'index']);
Route::get('operator/{id}',[ OperatorController::class, 'show']);

// APN Parameters
Route::get('apn-params',[ApnParametersController::class, 'index']);
Route::get('apn-params/{id}',[ ApnParametersController::class, 'show']);
