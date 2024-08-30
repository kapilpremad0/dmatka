<?php

use App\Http\Controllers\Admin\BidController;
use App\Http\Controllers\Admin\DeclareResultController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WinnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[LoginController::class,'login'])->name('login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');

Route::group(['as' => 'admin.','prefix' => '/admin'], function (){

    Route::get('login',[LoginController::class,'login'])->name('login');

    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::post('check-login',[LoginController::class,'checkLogin'])->name('check_login');

    Route::group(['middleware' => 'auth' ], function (){
            Route::get('/',[HomeController::class,'dashboard'])->name('dashboard');
            Route::resource('games',GameController::class);
            Route::resource('users',UserController::class);
            Route::resource('bids',BidController::class);
            Route::resource('transactions',TransactionController::class);
            Route::resource('settings',SettingController::class);
            Route::resource('declare_result',DeclareResultController::class);
            Route::resource('winners',WinnerController::class);
            Route::post('settings/store_game_rates',[SettingController::class,'storeGameRates'])->name('settings.store_game_rates');

            Route::get('leaderboard',[GameController::class,'leaderboard'])->name('leaderboard');
            Route::get('users/transactions/{id}',[UserController::class,'transactions'])->name('users.transactions');
            Route::get('users/bids/{id}',[UserController::class,'bids'])->name('users.bids');
            Route::get('users/winners/{id}',[UserController::class,'winners'])->name('users.winners');
    });

});