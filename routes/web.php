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

Route::get('/home', 'PagesController@getHome')->name('home');
Route::get('/products', 'PagesController@getProducts')->name('products');
Route::get('/contact-us', 'PagesController@getContact')->name('contact');

Route::group(['middleware' => ['auth']], function () {

	Route::group(['prefix'=> 'admin','middleware' => ['admin']], function () {
		Route::get('/','DashboardController@getAdminDashboard');
		Route::get('/users','AdminUsersController@index');
		Route::resource('service-providers','AdminServiceProvidersController');
		Route::resource('products','ProductsController');
	});

	Route::group(['prefix'=> 'service-providers', 'middleware' => ['service-providers']], function () {
		Route::get('/','DashboardController@getSpDashboard');
	});
});
