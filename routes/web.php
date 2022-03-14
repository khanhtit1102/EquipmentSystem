<?php

use App\Http\Controllers\EquipmentController;
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

Route::get('clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    //Artisan::call('storage:link');
    return 'xong';
});

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('Homepage');

Route::resource('/equipment', EquipmentController::class);

Route::group(['prefix' => 'export'], function () {
    Route::get('/equipment', 'App\Http\Controllers\ExportDataController@Equipments')->name('exportdata.equipment');
});

Route::group(['prefix' => 'import'], function () {
    Route::get('/equipment', 'App\Http\Controllers\ImportDataController@Equipments')->name('importdata.equipment');
    Route::post('/equipment/upload', 'App\Http\Controllers\ImportDataController@EquipmentUpload')->name('importdata.equipmentupload');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
