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



Route::post('v1/catalog/', 'APICatalogController@store');
Route::put('v1/catalog/{id}', 'APICatalogController@update');
Route::delete('v1/catalog/{id}', 'APICatalogController@destroy');
Route::put('v1/catalog/{id}/rent', 'APICatalogController@putRent');
Route::put('v1/catalog/{id}/return', 'APICatalogController@putReturn');

*/
Route::resource('v1/catalog', 'API\APICatalogController',
['only' => ['index', 'show']])->parameters([
    'catalog' => 'id'
]);
Route::group(['middleware' => 'auth.basic.once'], function () {
    Route::resource('v1/catalog', 'API\APICatalogController',
    ['except' => ['index', 'show']])->parameters([
        'catalog' => 'id'
    ]);

    Route::put('v1/catalog/{id}/rent', 'API\APICatalogController@putRent');
    Route::put('v1/catalog/{id}/return', 'API\APICatalogController@putReturn');
    });


