<?php

//BASIC ROUTES

Route::get('/', function () {
    return view('frontend/pages/home');
});

Route::get('/auctioneers', function () {

    return view('frontend/pages/auctioneers');
});

Route::get('/auctioneers-houses', function () {

    return view('frontend/pages/auctioneers-houses');
});

Route::get('/contact', function () {

    return view('frontend/pages/contact');
});

//DASHBOARD ROUTES

Route::auth();

//Disable adminLte default routes
Route::get('/home', function () {
    abort(404);
});

Route::get('/dashboard/home', 'HomeController@index');

Route::get('/dashboard/auctioneers-houses', 'AuctioneersHousesController@index');

Auth::routes();

Route::resource('/dashboard/auctioneers', 'AuctioneersController');
