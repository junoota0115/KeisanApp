<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('stock','API\StockController@update');

Route::middleware(['api'])->group(function () {
    // # 商品id追加
    // Route::post('stock/update/{id}', 'App\Http\Controllers\StockController@update'); 
    Route::post('stock/update/{id}', [StockController::class, 'update']); 
    
    // # Stockテーブルデータ表示
    // Route::get('/stock','App\Http\Controllers\StockController@index');
    Route::get('/stock', [StockController::class, 'index']); 
});