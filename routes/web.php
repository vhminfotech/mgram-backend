<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ApnParametersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AppConfigController;
use App\Models\AppConfig;

Route::get('clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode1 = Artisan::call('route:clear');
    $exitCode2 = Artisan::call('config:clear');
    $exitCode3 = Artisan::call('view:clear');
    return '<h1>cache route config view cleared</h1>';
});

Route::get('/', [IndexController::class, 'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [IndexController::class, 'index'])->name('dashboard');
    Route::get('users', [UserController::class, 'index']);
    
    //APN
    Route::get('apnlist', [ApnParametersController::class, 'ApnListIndex']);
    Route::get('addApn', [ApnParametersController::class, 'addApnForm']);
    Route::post('addApn', [ApnParametersController::class, 'addApn']);
    Route::get('editapn/{id}', [ApnParametersController::class, 'editApnForm']);
    Route::post('editapn/{id}', [ApnParametersController::class, 'editApn']);
    
    //Operators
    Route::get('operatorlist', [OperatorController::class, 'OperatorListIndex']);
    Route::get('addOperator', [OperatorController::class, 'addOperatorForm']);
    Route::post('addOperator', [OperatorController::class, 'addOperator']);
    Route::get('editOperator/{id}', [OperatorController::class, 'editOperatorForm']);
    Route::post('editOperator/{id}', [OperatorController::class, 'editOperator']);
    
    //AJAX ROUTES
    
    //APN
    Route::post('ajaxGetApn', [ApnParametersController::class, 'ajaxGetAPN']);
    Route::post('ajaxDeleteApn', [ApnParametersController::class, 'deleteApn']);
    //Operators
    Route::post('ajaxGetOperators', [OperatorController::class, 'ajaxGetOperators']);
    Route::post('ajaxDeleteOperator', [OperatorController::class, 'deleteOperator']);
    
    
    //Setting
    Route::get('settings', [AppConfigController::class, 'SettingList']);
    Route::get('configIndex/{id}', [AppConfigController::class, 'ConfigIndex']);
    Route::get('editSetting/{id}', [AppConfigController::class, 'editSettingForm']);
    Route::post('editSetting/{id}', [AppConfigController::class, 'editSetting']);
    
    Route::get('cac/{id}', [AppConfig::class, 'createAppConfig']);
});

