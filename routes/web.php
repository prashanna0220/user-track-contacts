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
    return view('main');
});

//AUTH
Auth::routes();
Route::get('home', 'HomeController@index');

Route::get('contact/{id}', 'AddressController@create');
Route::post('contact', 'AddressController@store');
Route::get('delete/{id}','AddressController@destroy');