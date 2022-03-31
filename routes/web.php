<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/**
 * frontend controller
 */
Route::get('/', [FrontendController::class, 'index']);


/**
 * admin controller
 */
Route::resource('product', ProductController::class);
