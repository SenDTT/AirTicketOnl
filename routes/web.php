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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::resource('locations', 'LocationsController');
    Route::resource('banks', 'BanksController');
    Route::resource('seatClasses', 'SeatClassesController');
    Route::resource('airplanes', 'AirplanesController');
    Route::resource('flights', 'FlightController');
    Route::resource('airlines', 'AirlineController');
    Route::resource('routes', 'RouteController');
    Route::resource('airports', 'AirportController');
});
