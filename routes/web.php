<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CateringController;

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

    Route::get('/merchant/profile', [MerchantController::class, 'editProfile']);
    Route::post('/merchant/profile', [MerchantController::class, 'updateProfile']);
    Route::resource('/merchant/menus', MenuController::class);
    Route::get('/merchant/orders', [OrderController::class, 'merchantOrders']);

    Route::get('/customer/catering', [CateringController::class, 'index']);
    Route::get('/customer/catering/{id}', [CateringController::class, 'show']);
    Route::get('/customer/order', [OrderController::class, 'store']);

