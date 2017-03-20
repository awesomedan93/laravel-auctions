<?php

//BASIC ROUTES

Route::get('/', function () {
    return view('frontend/pages/home');
});

Route::get('/auctioneers', 'AuctioneersController@showAll');
Route::get('/auctioneers/{id}', 'AuctioneersController@show');

Route::get('/auctioneers-houses', 'AuctioneersHousesController@showAll');
Route::get('/auctioneers-houses/{id}', 'AuctioneersHousesController@show');

Route::get('/contact', function () {

    return view('frontend/pages/contact');
});

//DASHBOARD ROUTES

Route::get('/dashboard', 'HomeController@index');

Auth::routes();

Route::resource('/dashboard/auctioneers', 'AuctioneersController');
Route::resource('/dashboard/auctioneer-houses', 'AuctioneersHousesController');
