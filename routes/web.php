<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\FlooringController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SummaryController;
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

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'area', 'as' => 'area.'], function () {
    Route::controller(AreaController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::delete('delete', 'delete')->name('delete');
        Route::post('edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
    });
});

Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
    Route::controller(GeneralController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::delete('delete', 'delete')->name('delete');
        Route::post('edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
    });
});

Route::group(['prefix' => 'flooring', 'as' => 'flooring.'], function () {
    Route::controller(FlooringController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::delete('delete', 'delete')->name('delete');
        Route::post('edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
    });
});

Route::group(['prefix' => 'summary', 'as' => 'summary.'], function () {
    Route::controller(SummaryController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::delete('delete', 'delete')->name('delete');
        Route::post('edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
    });
});
