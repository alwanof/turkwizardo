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


//Route::get('lang/feeds/{lang?}', 'API\FeedController@index');
Route::post('front/form/forward', 'API\FrontformController@forward')->name('front.form.forward');
Route::get('search/deep/feeds', 'API\FeedController@deepSearch');
Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('users', 'API\UserController');
    Route::get('search/users', 'API\UserController@search');
    Route::apiResource('feeds', 'API\FeedController');
    Route::apiResource('categories', 'API\CategoryController');
    Route::get('lang/feeds/{lang?}', 'API\FeedController@index');
    Route::get('lang/categories/{lang?}', 'API\CategoryController@index');
    Route::get('search/feeds/{lang?}', 'API\FeedController@search');
    Route::get('search/categories/{lang?}', 'API\CategoryController@search');


});

Route::get('test', function () {
    $lat2=28.9280751;
    $lat1=28.989345;
    $lon2=41.0141865;
    $lon1=41.0637573;

    $R = 6371; // Radius of the earth in km
    $dLat = ($lat2-$lat1)*0.01746;  // deg2rad below
    $dLon = ($lon2-$lon1)*0.01746;
    $a =
        sin($dLat/2) * sin($dLat/2) +
        cos($lat1*0.01746) * cos($lat2*0.01746) *
        sin($dLon/2) * sin($dLon/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    $d = $R * $c; // Distance in km
    $res=sqrt(($d*$d)/2)*2;
    return round(($d+($d*0.2)),2).' <-> '.round($res,2). ' km';
});
