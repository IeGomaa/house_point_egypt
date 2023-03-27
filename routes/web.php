<?php

use App\Http\Controllers\Area\AreaController;
use App\Http\Controllers\Area\AreaExcelController;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Error\ErrorController;
use App\Http\Controllers\Floor\FloorController;
use App\Http\Controllers\Floor\FloorExcelController;
use App\Http\Controllers\Flooring\FlooringController;
use App\Http\Controllers\Flooring\FlooringExcelController;
use App\Http\Controllers\Furniture\FurnitureController;
use App\Http\Controllers\Furniture\FurnitureExcelController;
use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\General\GeneralExcelController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Keyword\KeywordController;
use App\Http\Controllers\Link\LinkController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Property\PropertyController;
use App\Http\Controllers\Property_Flooring\PropertyFlooringController;
use App\Http\Controllers\Property_General\PropertyGeneralController;
use App\Http\Controllers\Property_Image\PropertyImageController;
use App\Http\Controllers\Property_Summary\PropertySummaryController;
use App\Http\Controllers\Property_Type\PropertyTypeController;
use App\Http\Controllers\Property_Type\PropertyTypeExcelController;
use App\Http\Controllers\Sub_Area\SubAreaController;
use App\Http\Controllers\Summary\SummaryController;
use App\Http\Controllers\Summary\SummaryExcelController;
use App\Http\Controllers\User\UserController;
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

Route::group(['as' => 'error.'], function () {
    Route::controller(ErrorController::class)->group(function () {
        Route::get('404', 'page_not_found')->name('404');
        Route::get('403', 'not_allowed_here')->name('403');
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

        Route::controller(AreaExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export');
        });
    });

    Route::group(['prefix' => 'property-type', 'as' => 'property-type.'], function () {
        Route::controller(PropertyTypeController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(PropertyTypeExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export');
        });
    });

    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::controller(PropertyController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });

//        Route::controller(PropertyExcelController::class)->group(function () {
//            Route::get('import-page', 'import_page')->name('import-page');
//            Route::post('import', 'import')->name('import');
//            Route::get('export', 'export')->name('export');
//        });
    });

    Route::group(['prefix' => 'property-flooring', 'as' => 'property-flooring.'], function () {
        Route::controller(PropertyFlooringController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });

//        Route::controller(PropertyFlooringExcelController::class)->group(function () {
//            Route::get('import-page', 'import_page')->name('import-page');
//            Route::post('import', 'import')->name('import');
//            Route::get('export', 'export')->name('export');
//        });
    });

    Route::group(['prefix' => 'property-summary', 'as' => 'property-summary.'], function () {
        Route::controller(PropertySummaryController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });

//        Route::controller(PropertySummaryExcelController::class)->group(function () {
//            Route::get('import-page', 'import_page')->name('import-page');
//            Route::post('import', 'import')->name('import');
//            Route::get('export', 'export')->name('export');
//        });
    });

    Route::group(['prefix' => 'property-general', 'as' => 'property-general.'], function () {
        Route::controller(PropertyGeneralController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });

//        Route::controller(PropertyGeneralExcelController::class)->group(function () {
//            Route::get('import-page', 'import_page')->name('import-page');
//            Route::post('import', 'import')->name('import');
//            Route::get('export', 'export')->name('export');
//        });
    });

    Route::group(['prefix' => 'property-image', 'as' => 'property-image.'], function () {
        Route::controller(PropertyImageController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'owner', 'as' => 'owner.'], function () {
        Route::controller(OwnerController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::post('search', 'search')->name('search');
        });
    });

    Route::group(['prefix' => 'sub-area', 'as' => 'sub-area.'], function () {
        Route::controller(SubAreaController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'keyword', 'as' => 'keyword.'], function () {
        Route::controller(KeywordController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'link', 'as' => 'link.'], function () {
        Route::controller(linkController::class)->group(function () {
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

        Route::controller(GeneralExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export');
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

        Route::controller(SummaryExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export');
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

        Route::controller(FloorExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export');
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

        Route::controller(FurnitureExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export');
        });
    });

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::delete('delete', 'delete')->name('delete');
        });
    });

});
