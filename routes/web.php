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

use Illuminate\Support\Facades\App;

Route::get('lang/set/{lang}', function ($lang) {
    App::setLocale($lang);
    session(['lang' => $lang]);
    return back()->with('alert', __('alerts.LANGUAGE_CHANGED'));
})->name('lang');

Route::get('/', 'StartController@index')->name('start');

Route::get('/results', 'StartController@search')->name('results');
Route::resource('/pages', 'PageController');
Route::resource('/requests', 'DemandController');
Route::get('/archive/{demand}', 'DemandController@archive')->name('requests.archive');


Route::get('/factory/{hash}','FeedController@show' )->name('feeds.show');
Route::get('/category/{hash}', 'CategoryController@show')->name('category.show');
Auth::routes();

Route::prefix('admin')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dash', 'UsersController@index')->name('admin.users');
    Route::get('/feeds/{lang?}', 'FeedController@index')->name('feeds');
    Route::get('/cats/{lang?}', 'CategoryController@index')->name('categories');
    Route::get('/feed/create', 'FeedController@create')->name('feeds.create');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::get('/feed/edit/{feed}', 'FeedController@edit')->name('feeds.edit');
    Route::get('/category/edit/{category}', 'CategoryController@edit')->name('categories.edit');
    Route::post('/feed/store', 'FeedController@store')->name('feeds.store');
    Route::post('/category/store', 'CategoryController@store')->name('categories.store');
    Route::get('/leads', 'LeadController@index')->name('leads');

});
