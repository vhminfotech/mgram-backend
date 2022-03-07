<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ApnParametersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\AppConfigController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Login Register
Route::post('registration',[ UserController::class, 'Registration']);
Route::delete('deleteusers',[ UserController::class, 'deleteUsers']);

//Operators 
Route::get('operators',[ OperatorController::class, 'index']);
Route::get('operator/{id}',[ OperatorController::class, 'show']);

// APN Parameters
Route::get('apn-params',[ApnParametersController::class, 'index']);
Route::get('apn-params/{id}',[ ApnParametersController::class, 'show']);

// Colors
Route::get('colors',[ColorsController::class, 'index']);
Route::get('color/{id}',[ColorsController::class, 'show']);

//App Config
Route::get('app_config_all',[AppConfigController::class, 'index']);
Route::get('app_config',[AppConfigController::class, 'show']);