<?php

use App\Http\Controllers\Area\AreaController;
use App\Http\Controllers\Area\AreaExcelController;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Country\CountryExcelController;
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
use App\Http\Controllers\ModelRoleController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Property\PropertyController;
use App\Http\Controllers\Property\PropertyExcelController;
use App\Http\Controllers\Property_Flooring\PropertyFlooringController;
use App\Http\Controllers\Property_Flooring\PropertyFlooringExcelController;
use App\Http\Controllers\Property_General\PropertyGeneralController;
use App\Http\Controllers\Property_General\PropertyGeneralExcelController;
use App\Http\Controllers\Property_Image\PropertyImageController;
use App\Http\Controllers\Property_Summary\PropertySummaryController;
use App\Http\Controllers\Property_Summary\PropertySummaryExcelController;
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
            Route::get('index', 'index')->name('index')->middleware('permission:index user');
            Route::get('create', 'create')->name('create')->middleware('permission:create user');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete user');
            Route::get('edit', 'edit')->name('edit')->middleware('permission:edit user');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'area', 'as' => 'area.'], function () {
        Route::controller(AreaController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index area');
            Route::get('create', 'create')->name('create')->middleware('permission:create area');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete area');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit area');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(AreaExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import area');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export area');
        });
    });

    Route::group(['prefix' => 'property-type', 'as' => 'property-type.'], function () {
        Route::controller(PropertyTypeController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index property type');
            Route::get('create', 'create')->name('create')->middleware('permission:create property type');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete property type');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit property type');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(PropertyTypeExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import property type');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export property type');
        });
    });

    Route::group(['prefix' => 'property', 'as' => 'property.'], function () {
        Route::controller(PropertyController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index property');
            Route::get('create', 'create')->name('create')->middleware('permission:create property');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete property');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit property');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(PropertyExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import property');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export property');
        });
    });

    Route::group(['prefix' => 'property-flooring', 'as' => 'property-flooring.'], function () {
        Route::controller(PropertyFlooringController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index property flooring');
            Route::get('create', 'create')->name('create')->middleware('permission:create property flooring');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete property flooring');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit property flooring');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(PropertyFlooringExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import property flooring');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export property flooring');
        });
    });

    Route::group(['prefix' => 'property-summary', 'as' => 'property-summary.'], function () {
        Route::controller(PropertySummaryController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index property summary');
            Route::get('create', 'create')->name('create')->middleware('permission:create property summary');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete property summary');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit property summary');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(PropertySummaryExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import property summary');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export property summary');
        });
    });

    Route::group(['prefix' => 'property-general', 'as' => 'property-general.'], function () {
        Route::controller(PropertyGeneralController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index property general');
            Route::get('create', 'create')->name('create')->middleware('permission:create property general');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete property general');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit property general');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(PropertyGeneralExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import property general');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export property general');
        });
    });

    Route::group(['prefix' => 'property-image', 'as' => 'property-image.'], function () {
        Route::controller(PropertyImageController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index property image');
            Route::get('create', 'create')->name('create')->middleware('permission:create property image');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete property image');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit property image');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'owner', 'as' => 'owner.'], function () {
        Route::controller(OwnerController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index search');
            Route::post('search', 'search')->name('search');
        });
    });

    Route::group(['prefix' => 'sub-area', 'as' => 'sub-area.'], function () {
        Route::controller(SubAreaController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index sub area');
            Route::get('create', 'create')->name('create')->middleware('permission:create sub area');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete sub area');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit sub area');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'keyword', 'as' => 'keyword.'], function () {
        Route::controller(KeywordController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index keyword');
            Route::get('create', 'create')->name('create')->middleware('permission:create keyword');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete keyword');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit keyword');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'link', 'as' => 'link.'], function () {
        Route::controller(linkController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index link');
            Route::get('create', 'create')->name('create')->middleware('permission:create link');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete link');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit link');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
        Route::controller(GeneralController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index general');
            Route::get('create', 'create')->name('create')->middleware('permission:create general');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete general');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit general');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(GeneralExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import general');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export general');
        });
    });

    Route::group(['prefix' => 'flooring', 'as' => 'flooring.'], function () {
        Route::controller(FlooringController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index flooring');
            Route::get('create', 'create')->name('create')->middleware('permission:create flooring');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete flooring');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit flooring');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(FlooringExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import flooring');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export flooring');
        });
    });

    Route::group(['prefix' => 'summary', 'as' => 'summary.'], function () {
        Route::controller(SummaryController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index summary');
            Route::get('create', 'create')->name('create')->middleware('permission:create summary');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete summary');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit summary');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(SummaryExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import summary');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export summary');
        });
    });

    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index blog');
            Route::get('create', 'create')->name('create')->middleware('permission:create blog');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete blog');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit blog');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
        Route::controller(CountryController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index country');
            Route::get('create', 'create')->name('create')->middleware('permission:create country');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete country');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit country');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(CountryExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import country');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export country');
        });
    });

    Route::group(['prefix' => 'floor', 'as' => 'floor.'], function () {
        Route::controller(FloorController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index floor');
            Route::get('create', 'create')->name('create')->middleware('permission:create floor');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete floor');
            Route::post('edit', 'edit')->name('edit')->middleware('permission:edit floor');
            Route::put('update', 'update')->name('update');
        });

        Route::controller(FloorExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import floor');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export floor');
        });
    });

    Route::group(['prefix' => 'furniture', 'as' => 'furniture.'], function () {
        Route::controller(FurnitureController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index furniture');
            Route::get('create', 'create')->name('create')->middleware('permission:create furniture');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete furniture');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update')->middleware('permission:edit furniture');
        });

        Route::controller(FurnitureExcelController::class)->group(function () {
            Route::get('import-page', 'import_page')->name('import-page')->middleware('permission:import furniture');
            Route::post('import', 'import')->name('import');
            Route::get('export', 'export')->name('export')->middleware('permission:export furniture');
        });
    });

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index contact');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete contact');
        });
    });

    Route::group(['prefix' => 'role-model', 'as' => 'role-model.'], function () {
        Route::controller(ModelRoleController::class)->group(function () {
            Route::get('index', 'index')->name('index')->middleware('permission:index role model');
            Route::get('create', 'create')->name('create')->middleware('permission:create role model');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete')->middleware('permission:delete role model');
        });
    });

});
