<?php

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
}); Route::get('/spi', 'SpiController@index');

Route::group(['prefix' => 'spi'], function () {
    Route::get('/', 'SpiController@index');
    Route::match(['get', 'post'], 'create', 'SpiController@create');
    Route::match(['get', 'put'], 'update/{id}', 'SpiController@update');
    Route::delete('delete/{id}', 'SpiController@delete');
});

Route::group(['prefix' => 'kim'], function () {
    Route::get('/', 'KimController@index');
    Route::match(['get', 'post'], 'create', 'KimController@create');
    Route::match(['get', 'put'], 'update/{id}', 'KimController@update');
    Route::delete('delete/{id}', 'KimController@delete');
});


Route::post('/spi/import_excel', 'SpiController@import_excel');
Route::delete('spi/truncate',array('as'=>'spi.truncate', 'uses'=>'SpiController@truncate'));
	
Route::post('/kim/import_excel', 'KimController@import_excel');
Route::delete('kim/truncate',array('as'=>'kim.truncate', 'uses'=>'KimController@truncate'));

Route::get('scan','ScanController@scan');
Route::get('ceksession','ScanController@ceksession');
Route::post('/spi/{id}/qrcode', 'SpiController@qrcode');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::Routes();
Route::get('/spi/{id}/show','SpiController@show');
