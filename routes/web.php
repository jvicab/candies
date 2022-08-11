<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

/** frontend routes */

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


/** backend routes */

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::group(['prefix' => 'candy-bars'], function (){
        Route::get('/', [App\Http\Controllers\CandyBarsController::class, 'index'])->name('candy_bar_list');
        Route::get('/create', [App\Http\Controllers\CandyBarsController::class, 'create'])->name('candy_bar_create');
        Route::post('/store', [App\Http\Controllers\CandyBarsController::class, 'store'])->name('candy_bar_store');
    });


});


