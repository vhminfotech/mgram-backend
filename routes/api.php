<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ApnParametersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\AppConfigController;
use App\Http\Controllers\UserMetaController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\MessagesController;

//Login Register
Route::post('registration',[ UserController::class, 'Registration']);

//Operators 
Route::get('operators',[ OperatorController::class, 'index']);
Route::get('operator/{id}',[ OperatorController::class, 'show']);

// APN Parameters
Route::get('apn-params',[ApnParametersController::class, 'index']);
Route::get('apn-params/{id}',[ ApnParametersController::class, 'show']);

//App Config
Route::get('app_config_all',[AppConfigController::class, 'index']);
Route::get('app_config',[AppConfigController::class, 'show']);

//Turncate Users
Route::delete('deleteusers',[ UserController::class, 'deleteUsers']);

//add this middleware to ensure that every request is authenticated
Route::middleware('auth:api')->group(function(){

    Route::get('colors',[ColorsController::class, 'index']);
    Route::get('color/{id}',[ColorsController::class, 'show']);

    Route::post('updateUserMeta', [UserMetaController::class, 'updateUserMeta']);
    Route::get('getUserMeta', [UserMetaController::class, 'getUserMeta']);
    
    Route::post('attachment', [AttachmentController::class, 'storeAttachment']);
    Route::get('attachment/{id}', [AttachmentController::class, 'getAttachment']);
    
    Route::post('compose', [MessagesController::class, 'composeMessage']);
});


