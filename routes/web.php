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

Auth::routes();
//Route::group(['prefix' => 'Auth'], function() {
//    Route::post('/recorder', 'Auth\RegisterController@recorder')->name('recorder');
//});
//Route::post('/recorder', 'HomeController@recorder')->name('recorder');
Route::post('/recorder', 'SystemController@recorder')->name('recorder');
//Route::get('/home', 'Auth\RegisterController@_create')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/dash', 'HomeController@index')->name('dash');

Route::resources([
    'company' => 'CompanyController',
    'user' => 'UserController'
]);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
