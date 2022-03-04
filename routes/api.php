<?php

use App\Http\Controllers\API\EquipmentController;
use App\Http\Controllers\API\FactoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
//     // return response()->json('Hello',200)
// });

Route::group(['prefix' => 'v1'], function () {
    Route::get('file-tracking/', function () {
        return App\TrackingFile::select('model', DB::raw('sum(file_size) as group_size, COUNT(model) as total_file'))->groupBy('model')->limit(10)->orderby('group_size','desc')->get();
    })->name('trackingfile');

    Route::get('file-tracking/{fromdate}/{todate}', function ($fromdate, $todate) {
        // return $fromdate . $todate;
        return App\TrackingFile::select('model', DB::raw('sum(file_size) as group_size, COUNT(model) as total_file'))->where('created_at', '>=', $fromdate)->where('created_at', '<', $todate)->groupBy('model')->limit(10)->orderby('group_size', 'desc')->get();
    })->name('trackingfilewithdate');

    // Route::resource('/equipment', EquipmentController::class);
    Route::resource('/factory', FactoryController::class);
});
