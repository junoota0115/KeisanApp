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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/index', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/create', [App\Http\Controllers\ProductController::class, 'showCreate'])->name('showCreate');
Route::post('/create', [App\Http\Controllers\ProductController::class, 'exeCreate'])->name('exeCreate');
Route::get('/show/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('show');
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post('/update', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::post('/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
