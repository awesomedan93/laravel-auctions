<?php

//BASIC ROUTES

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/auctioneers', function () {

    return view('pages/auctioneers');
});

Route::get('/auctioneers-houses', function () {

    return view('pages/auctioneers-houses');
});

Route::get('/contact', function () {

    return view('pages/contact');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//DASHBOARD ROUTES

Route::auth();

Route::get('/dashboard/home', 'HomeController@index');

//Disable adminLte default routes
Route::get('/home', function () {
    abort(404);
});

Route::get('/dashboard/auctioneers', 'AuctioneersController@index');