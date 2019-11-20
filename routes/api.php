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

Route::get('/user', function (Request $request) {
    return $request->user();
});


Route::get('lang/feeds/{lang?}', 'API\FeedController@index');

Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('users', 'API\UserController');
    Route::get('search/users', 'API\UserController@search');
    Route::apiResource('feeds', 'API\FeedController');
    Route::get('lang/feeds/{lang?}', 'API\FeedController@index');
    Route::get('search/feeds/{lang?}', 'API\FeedController@search');
    Route::get('test', function () {
        return 55;
    });
});