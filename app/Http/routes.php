<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// give precedenco to api namespace prefix, dont need to be localised
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::get('cities', 'ApiController@cities');
    Route::get('inventories', 'ApiController@inventories')->name('inventory.show');
    Route::post('inventories', 'ApiController@storeInventory')->name('inventory.store');
    Route::delete('inventories/{inventory}', 'ApiController@destroyInventory')->name('inventory.destroy');
});

// Overrride Authentication routes
// Route::auth();

// For localised Auth
// Authentication routes...
Route::get('{locale}/login', 'Auth\AuthController@showLoginForm');
Route::post('{locale}/login', 'Auth\AuthController@login');
Route::get('{locale}/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('{locale}/register', 'Auth\AuthController@register');
Route::post('{locale}/register', 'Auth\AuthController@showRegistrationForm');

// Password reset link request routes...
Route::post('{locale}/password/email', 'Auth\PasswordController@sendResetLinkEmail');

// Password reset routes...
Route::post('{locale}/password/reset', 'Auth\PasswordController@reset');
Route::get('{locale}/password/reset/{token}', 'Auth\PasswordController@showResetForm');

// Static pages
Route::get('/', 'PagesController@index');
Route::get('/{locale}/', 'PagesController@index');
Route::get('{locale}/home', 'PagesController@index');
Route::get('{locale}/about', 'PagesController@about');
Route::get('{locale}/contact', 'PagesController@contact');
Route::post('{locale}/contact', 'PagesController@store');

// App Controllers
Route::resource('{locale}/actors', 'ActorsController', ['parameters'=>['actors'=>'actor']]);
Route::resource('{locale}/categories', 'CategoriesController', ['parameters'=>['categories'=>'category']]);
Route::resource('{locale}/cities', 'CitiesController', ['parameters'=>['cities'=>'city']]);
Route::resource('{locale}/countries', 'CountriesController', ['parameters'=>['countries'=>'country']]);
Route::resource('{locale}/customers', 'CustomersController', ['parameters'=>['customers'=>'customer']]);
Route::resource('{locale}/films', 'FilmsController', ['parameters'=>['films'=>'film']]);
Route::resource('{locale}/languages', 'LanguagesController', ['parameters'=>['languages'=>'language']]);
Route::resource('{locale}/rentals', 'RentalsController', ['parameters'=>['rentals'=>'rental']]);
Route::resource('{locale}/staffs', 'StaffsController', ['parameters'=>['staffs'=>'staff']]);
Route::resource('{locale}/stores', 'StoresController', ['parameters'=>['stores'=>'store']]);

// custom routes for rental payment 
Route::get('{locale}/rentals/{rental}/payment', ['as'=>'rentals.payment', 'uses'=>'RentalsController@payment']);
Route::post('{locale}/rentals/{rental}/payment', ['as'=>'rentals.payUp', 'uses'=>'RentalsController@payUp']);
