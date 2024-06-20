<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DealController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * ACCOUNT
 * */
//Route::resource('accounts', AccountController::class);
Route::get('accounts', [AccountController::class, 'index']);
Route::get('accounts/{account}', [AccountController::class, 'show']);
Route::post('accounts', [AccountController::class, 'store']);
Route::get('accounts/{account}/edit', [AccountController::class, 'edit']);
Route::put('accounts/{account}', [AccountController::class, 'update']);
Route::delete('accounts/{account}', [AccountController::class, 'destroy']);


/**
 * DEAL
 * */
Route::get('deals', [DealController::class, 'index']);
Route::get('deals/{deal}', [DealController::class, 'show']);
Route::post('deals', [DealController::class, 'store']);
Route::get('deals/{deal}/edit', [DealController::class, 'edit']);
Route::put('deals/{deal}', [DealController::class, 'update']);
Route::delete('deals/{deal}', [DealController::class, 'destroy']);
