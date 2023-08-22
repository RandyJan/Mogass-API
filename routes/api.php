<?php

use App\Http\Controllers\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\syncTransController;
use App\Http\Controllers\syncEarningsController;
use App\Http\Controllers\syncPointsinquiryController;
use App\Http\Controllers\syncRedemptionController;


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
Route::post('/register', [authController::class, 'register']);
Route::post('/login',[authcontroller::class, 'login']);

Route::group(['middleware'=> ['auth:sanctum']], function () {
Route::get('/syncPointsinquiry/{id}',[syncPointsinquiryController::class, 'show']);
Route::post('/syncEarnings',[syncEarningsController::class, 'store']);
Route::post('/syncTrans',[syncTransController::class, 'store']);
Route::post('/syncRedemption', [syncRedemptionController::class, 'store']);

});
