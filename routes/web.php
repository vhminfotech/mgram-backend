<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ApnParametersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AppConfigController;

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
    Route::get('subscribers', [UserController::class, 'index']);

    //APN
    Route::get('apnlist', [ApnParametersController::class, 'ApnListIndex']);
    Route::get('addApn', [ApnParametersController::class, 'addApnForm']);
    Route::get('editapn/{id}', [ApnParametersController::class, 'editApnForm'])->name('editapn');
    Route::get('apnTrash', [ApnParametersController::class, 'apnTrash']);

    //Operators
    Route::get('operatorlist', [OperatorController::class, 'OperatorListIndex']);
    Route::get('addOperator', [OperatorController::class, 'addOperatorForm']);
    Route::get('editOperator/{id}', [OperatorController::class, 'editOperatorForm'])->name('editOperator');
    Route::get('operatorTrash', [OperatorController::class, 'operatorTrash']);


     //Setting
    Route::get('settings', [AppConfigController::class, 'SettingList']);
    Route::get('configIndex/{id}', [AppConfigController::class, 'ConfigIndex'])->name('configIndex');
    Route::get('editSetting/{id}', [AppConfigController::class, 'editSettingForm'])->name('editSetting');

    //AJAX ROUTES

    //Dashboard
    Route::post('ajaxGetYear', [IndexController::class, 'ajaxGetYear']);
    //APN
    Route::post('ajaxEditApn', [ApnParametersController::class, 'ajaxEditAPN']);
    Route::post('ajaxAddApn', [ApnParametersController::class, 'ajaxAddAPN']);
    Route::post('ajaxGetApn', [ApnParametersController::class, 'ajaxGetAPN']);
    Route::post('ajaxDeleteApn', [ApnParametersController::class, 'deleteApn']);
    Route::post('ajaxRestoreApn', [ApnParametersController::class, 'restoreApn']);

    //Operators
    Route::post('ajaxAddOperators', [OperatorController::class, 'ajaxAddOperators']);
    Route::post('ajaxEditOperators', [OperatorController::class, 'ajaxEditOperators']);
    Route::post('ajaxGetOperators', [OperatorController::class, 'ajaxGetOperators']);
    Route::post('ajaxDeleteOperator', [OperatorController::class, 'deleteOperator']);
    Route::post('ajaxRestoreOperator', [OperatorController::class, 'restoreOperator']);

    //Settings
    Route::post('ajaxEditSetting', [AppConfigController::class, 'ajaxEditSetting']);

});

