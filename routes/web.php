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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>'auth'], function () {

    Route::resource('locations', 'LocationsController');
    Route::resource('banks', 'BanksController');
    Route::resource('seatClasses', 'SeatClassesController');
    Route::resource('airplanes', 'AirplanesController');
    Route::resource('flights', 'FlightController');
    Route::resource('airlines', 'AirlineController');
    Route::resource('routes', 'RouteController');
    Route::resource('airports', 'AirportController');
    Route::resource('ticketType', 'TicketTypeController');
    Route::resource('ticketTypePrices', 'TicketTypePricesController');
    Route::resource('airplaneModel', 'AirplaneModelController');
    Route::resource('airplaneClass', 'AirplaneClassController');
    Route::resource('baggagePrices', 'BaggagePricesController');
    Route::resource('reservations', 'ReservationsController');
    Route::resource('reservationDetails', 'ReservationDetailsController');
    Route::resource('tickets', 'TicketsController');

});
Route::group(['prefix' => '', 'namespace' => 'Website'], function (){
    Route::get('home', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
    Route::post('/postHome',[
        'as' => 'postHome',
        'uses' => 'PostController@postHome'
    ]);
    Route::get('/flights/{from}/{to}/{date}/{returnDate}/{adult}/{child}/{baby}', [
        'as' => 'flights',
        'uses' => 'PostController@getFlights'
    ]);
    Route::get('/info', [
        'as' => 'info',
        function (){return view('frontend.info');}
    ]);
});

Route::group(['prefix' => '', 'namespace' => 'Website'], function (){
    Route::get('/','WebsiteController@index')->name('web.index');
    Route::match(['get', 'post'],'/tim-kiem.html','WebsiteController@search')->name('web.search');
    Route::get('/cart/add-new-ticket','WebsiteController@addNewTicket')->name('web.addNewTicket');
    Route::get('/cart/remove-ticket','WebsiteController@removeTicket')->name('web.removeTicket');
    Route::get('/cart/update-ticket','WebsiteController@updateTicket')->name('web.updateTicket');
    Route::get('/gio-hang.html','WebsiteController@cart')->name('web.cart');

    Route::get('/thanh-toan.html','WebsiteController@payment')->name('web.payment');
    Route::post('/thanh-toan.html','WebsiteController@postPayment')->name('web.postPayment');
    Route::get('/thanh-toan-thanh-cong.html','WebsiteController@paymentSuccess')->name('web.paymentSuccess');
});

Route::match(['GET', 'POST','PUT'],'/match',function(){
    return 'match route';
});
