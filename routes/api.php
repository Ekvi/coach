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

Route::group(['prefix' => 'v1'], function () {
    //Route::get('client', 'Api\v1\ClientController@index');
    Route::post('client/create', 'Api\v1\ClientController@create');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('client', 'Api\v1\ClientController@index');
        Route::get('client/test', 'Api\v1\ClientController@test');

        Route::get('client/{clientId}/foods', 'Api\v1\FoodsController@getByClientId')->where('clientId', '\d+');
    });
});

Route::get('test',function(){
    return response([1,2,3,4],200);
});

//Route::get('client', 'Api\ClientController@index');

