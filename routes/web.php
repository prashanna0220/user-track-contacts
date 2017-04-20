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

//CONTACT USER ADD
Route::get('home', 'AddressController@index');
Route::get('search','AddressController@index');
Route::get('contact/{id}', 'AddressController@create');
Route::post('contact', 'AddressController@store');
Route::get('show_data/{id}', 'AddressController@edit');
Route::post('edit/{id}', 'AddressController@update');
Route::get('delete/{id}','AddressController@destroy');
