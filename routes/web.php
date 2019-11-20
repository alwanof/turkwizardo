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

//use Illuminate\Support\Facades\Route;

use Faker\Factory as Faker;
use App\Feed;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/results', function () {
    return view('results');
})->name('results');


Route::get('/test', function () {
    $feed = Feed::find(13);

    return $feed->pics;
});

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dash', 'UsersController@index')->name('admin.users');
    Route::get('/feeds/{lang?}', 'FeedController@index')->name('feeds');
    Route::get('/feed/create', 'FeedController@create')->name('feeds.create');
    Route::get('/feed/edit/{feed}', 'FeedController@edit')->name('feeds.edit');
    Route::post('/feed/store', 'FeedController@store')->name('feeds.store');
});