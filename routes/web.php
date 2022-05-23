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
});
//crud data

Route::get('customer', 'CustomerController@index');
Route::get('customer/create', 'CustomerController@create');
Route::post('customer/store', 'CustomerController@store');
Route::delete('/customers/{id}', 'CustomerController@destroy');
Route::patch('customer/update/{customer}', 'CustomerController@update')->name('customer.update');
Route::get('customer/edit/{id}', 'CustomerController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
