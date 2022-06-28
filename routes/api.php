<?php

use Illuminate\Http\Request;

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

Route::get('password', function(){
return bcrypt('admin');
});
Route::get('/products', 'Productcontroller@index')->middleware('auth:api');
Route::get('/products/{product}','Productcontroller@show')->middleware('auth:api');;
Route::delete('/products/{product}','Productcontroller@destroy')->middleware('auth:api');
Route::post('/products', 'Productcontroller@store')->middleware('auth:api');
Route::patch('/products/{product}','Productcontroller@update')->middleware('auth:api');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('wajib', 'AuthController@wajib');

});