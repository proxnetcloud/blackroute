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

//Route::resources([
//    'company' => 'CompanyController',
//    'user' => 'UserController'
//]);

$Models = ['Company','User','Client','Test'];
foreach ($Models as $Model)
{
    Route::get('/'.strtolower($Model),
        ucfirst(strtolower($Model)).'Controller@index')->name(strtolower($Model).'.index');
    Route::get('/'.strtolower($Model).'/create',
        ucfirst(strtolower($Model)).'Controller@create')->name(strtolower($Model).'.create');
    Route::post('/'.strtolower($Model),
        ucfirst(strtolower($Model)).'Controller@store')->name(strtolower($Model).'.store');
    Route::get('/'.strtolower($Model).'/{'.strtolower($Model).'}',
        ucfirst(strtolower($Model)).'Controller@show')->name(strtolower($Model).'.show');
    Route::get('/'.strtolower($Model).'/{'.strtolower($Model).'}/edit',
        ucfirst(strtolower($Model)).'Controller@edit')->name(strtolower($Model).'.edit');
    Route::post('/'.strtolower($Model).'/{'.strtolower($Model).'}',
        ucfirst(strtolower($Model)).'Controller@update')->name(strtolower($Model).'.update');
    //Route::post('//{}/update', 'Controller@update')->name('.update');
    Route::get('/'.strtolower($Model).'/{'.strtolower($Model).'}/destroy',
        ucfirst(strtolower($Model)).'Controller@destroy')->name(strtolower($Model).'.destroy');

    // Model
//    Route::get('/model', 'ModelController@index')->name('.index');
//    Route::get('/model/create', $Model.'Controller@create')->name('.create');
//    Route::post('/model', $Model.'Controller@store')->name('.store');
//    Route::get('/model/{model}', $Model.'Controller@show')->name('.show');
//    Route::get('/model/{model}/edit', $Model.'Controller@edit')->name('.edit');
//    Route::post('/model/{model}', $Model.'Controller@update')->name('.update');
//    Route::get('/model/{model}/destroy', $Model.'Controller@destroy')->name('.destroy');
}
Route::get('/client/create',
    'ClientController@create')->name('client.create');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
