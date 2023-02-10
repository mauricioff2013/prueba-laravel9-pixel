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

/**Route::get('/', function () {
    return view('welcome');
});**/
Route::get('/','App\Http\Controllers\ItemController@index');
Route::get('item','App\Http\Controllers\ItemController@index');
Route::post('/submit', ['App\Http\Controllers\ItemController', 'submit']);
Route::post('/editItem', ['App\Http\Controllers\ItemController', 'editItem']);
Route::post('/delete', ['App\Http\Controllers\ItemController', 'delete']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
