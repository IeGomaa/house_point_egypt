<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\Flooring\FlooringController;
use App\Http\Controllers\Flooring\FlooringExcelController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'error', 'as' => 'error.'], function () {
    Route::controller(ErrorController::class)->group(function () {
        Route::get('404', 'pageNotFound')->name('404');
    });
});

Route::group(['as' => 'auth.'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('login', 'login')->name('login');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('index', 'index')->name('index');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
        });
    });

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

    Route::group(['prefix' => 'flooring', 'as' => 'flooring.'], function () {
        Route::controller(FlooringExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export');
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

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
        Route::controller(CountryController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'floor', 'as' => 'floor.'], function () {
        Route::controller(FloorController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'furniture', 'as' => 'furniture.'], function () {
        Route::controller(FurnitureController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::delete('delete', 'delete')->name('delete');
        });
    });

});
