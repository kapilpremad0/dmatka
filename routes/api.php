<?php

use App\Http\Controllers\Api\BidController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\WithdrawlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('register',[LoginController::class,'register']);
Route::post('login',[LoginController::class,'login']);
Route::get('games',[GameController::class,'index']);
Route::get('leaderboard',[GameController::class,'leaderboard']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('bids',BidController::class);
    Route::apiResource('wallet',WalletController::class);
    Route::apiResource('withdrawl',WithdrawlController::class);
    Route::get('home',[HomeController::class,'index']);
});