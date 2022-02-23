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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
