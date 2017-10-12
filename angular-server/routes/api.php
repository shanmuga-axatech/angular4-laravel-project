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

Route::get(
  'users', array('middleware' => 'cors', 'uses' =>'UserController@index')
);
Route::get(
  'users/{id}', array('middleware' => 'cors', 'uses' =>'UserController@show')
);
Route::post(
  'users', array('middleware' => 'cors', 'uses' =>'UserController@store')
);
Route::put(
  'users/{id}', array('middleware' => 'cors', 'uses' =>'UserController@update')
);
Route::delete(
  'users/{id}', array('middleware' => 'cors', 'uses'=>'UserController@destroy')
);



Route::get(
  'products', array('middleware' => 'cors', 'uses' =>'ProductController@index')
);
Route::get(
  'products/{id}', array('middleware' => 'cors', 'uses' =>'ProductController@show')
);
Route::post(
  'products', array('middleware' => 'cors', 'uses' =>'ProductController@store')
);
Route::put(
  'products/{id}', array('middleware' => 'cors', 'uses' =>'ProductController@update')
);
Route::delete(
  'products/{id}', array('middleware' => 'cors', 'uses'=>'ProductController@destroy')
);

Route::get(
  'users', array('middleware' => 'cors', 'uses' =>'LoginController@authenticate')
);

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
