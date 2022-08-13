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

/***********************************  Ajax  ***********************************/

Route::group(['prefix' => 'ajax'], function (){
    Route::post('ajax-upload-image', [\App\Http\Controllers\AjaxController::class, 'uploadImage'])->name('ajax_upload_image');
    Route::post('ajax-delete-image', [\App\Http\Controllers\AjaxController::class, 'deleteImage'])->name('ajax_delete_image');
});

/** frontend routes */

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


/** backend routes */

Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::group(['prefix' => 'candy-bars'], function (){
        Route::get('/', [App\Http\Controllers\CandyBarsController::class, 'index'])->name('candy_bar_list');
        Route::get('/create', [App\Http\Controllers\CandyBarsController::class, 'create'])->name('candy_bar_create');
        Route::post('/store', [App\Http\Controllers\CandyBarsController::class, 'store'])->name('candy_bar_store');
        Route::get('/{candy_bar}/edit', [\App\Http\Controllers\CandyBarsController::class, 'edit'])->name('candy_bar_edit');
        Route::patch('/{candy_bar}', [\App\Http\Controllers\CandyBarsController::class, 'update'])->name('candy_bar_update');
        Route::delete('/{candy_bar}', [\App\Http\Controllers\CandyBarsController::class, 'destroy'])->name('candy_bar_delete');
    });

});


