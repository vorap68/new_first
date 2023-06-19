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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
        ->middleware('role');

Route::resource('order', 'App\Http\Controllers\OrderController');
Route::get('manager/index','App\Http\Controllers\ManagerController@index')->name('manager.index');
Route::post('manager/active/{order}','App\Http\Controllers\ManagerController@active')->name('manager.active');


