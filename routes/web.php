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

Route::get('/', 'Homecontroller@index')->name('home');

Route::get('/edit/{slug}', 'AddressBookController@show');
Route::get('/delete/{slug}', 'AddressBookController@destroy');
Route::get('/csvexport', 'AddressBookController@csvexport');
Route::resource('address', 'AddressBookController');
