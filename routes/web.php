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

Auth::routes();

Route::get('/', 'PagesController@getHome')->name('home');
Route::get('/services', 'PagesController@getServices')->name('services');
Route::get('/services/{id}', 'PagesController@getSingleServices')->name('frontend-services.show');
Route::get('/contact-us', 'PagesController@getContact')->name('contact');
Route::post('/contact-us', 'ContactController@sendEmail')->name('contactSendEmail');

Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix'=> 'admin','middleware' => ['customer']], function () {
		Route::post('/services/{id}/save-order','OrderController@saveorder')->name('save.order');
		Route::get('/services/{id}/order','OrderController@orderPage')->name('order.page');
		Route::post('/services/{id}/order','OrderController@makeOrder')->name('make.order');
	});

	Route::group(['prefix'=> 'admin','middleware' => ['admin']], function () {
		Route::get('/','DashboardController@getAdminDashboard')->name('admin.home');
		Route::get('/users','AdminUsersController@index')->name('users.index');
		Route::resource('service-providers','ServiceProviderController');
		Route::resource('services','ServiceController');
	});

	Route::group(['prefix'=> 'service-provider', 'middleware' => ['service-providers']], function () {
		Route::get('/','DashboardController@getSpDashboard')->name('sp-home');
		Route::resource('/sp-services','SpServicesController',['except' => ['show','destroy','edit','update']]);
		Route::get('/sp-orders','OrderController@spOrders')->name('sp-orders');
	});
});
