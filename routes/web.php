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
    return view('item.index');
});

Route::group(['prefix' => 'item'], function() {
    Route::get('/', 'ItemController@index')->name('item');
    Route::get('/get', 'ItemController@get')->name('item.get');
    Route::get('/create', 'ItemController@create')->name('item.create');
    Route::post('/store', 'ItemController@store')->name('item.store');
    Route::get('/edit/{id?}', 'ItemController@edit')->name('item.edit');
    Route::post('/update/{id?}', 'ItemController@update')->name('item.update');
    Route::get('/delete/{id?}', 'ItemController@delete')->name('item.delete');
});