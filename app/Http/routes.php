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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('actors', 'ActorsController', ['parameters'=>['actors'=>'actor']]);
Route::resource('categories', 'CategoriesController', ['parameters'=>['categories'=>'category']]);
Route::resource('cities', 'CitiesController', ['parameters'=>['cities'=>'city']]);
Route::resource('countries', 'CountriesController', ['parameters'=>['countries'=>'country']]);
Route::resource('customers', 'CustomersController', ['parameters'=>['customers'=>'customer']]);
Route::resource('films', 'FilmsController', ['parameters'=>['films'=>'film']]);
Route::resource('languages', 'LanguagesController', ['parameters'=>['languages'=>'language']]);
Route::resource('rentals', 'RentalsController', ['parameters'=>['rentals'=>'rental']]);
Route::resource('staffs', 'StaffsController', ['parameters'=>['staffs'=>'staff']]);
Route::resource('stores', 'StoresController', ['parameters'=>['stores'=>'store']]);
