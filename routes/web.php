<?php

//BASIC ROUTES

Route::get('/', function () {
    return view('frontend/pages/home');
});

Route::get('/auctioneers', 'AuctioneersController@showAll');
Route::get('/auctioneers/{id}', 'AuctioneersController@show');

Route::get('/auction-houses', 'AuctionHousesController@showAll');
Route::get('/auction-houses/{id}', 'AuctionHousesController@show');

Route::get('/contact', function () {
    return view('frontend/pages/contact');
});
Route::post('/contact', ['as' => 'contact_us', 'uses' => 'HomeController@sendEmail']);
Route::get('/policy', function () {
    return view('frontend/pages/privacy-policy');
});
//DASHBOARD ROUTES

Route::get('/dashboard', 'HomeController@index');

Auth::routes();

Route::resource('/dashboard/auctioneers', 'AuctioneersController');
Route::resource('/dashboard/auction-houses', 'AuctionHousesController');

//AJAX ROUTES
Route::post('/submit-business', ['as' => 'submitBusiness', 'uses' => 'HomeController@saveBusiness']);
Route::post('/dashboard/auctioneers/{id}/approve', ['as' => 'approve.auctioneer', 'uses' => 'AuctioneersController@approve']);
Route::post('/dashboard/auction-houses/{id}/approve', ['as' => 'approve.auction.house', 'uses' => 'AuctionHousesController@approve']);