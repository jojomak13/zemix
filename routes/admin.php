<?php


Auth::routes();

Route::middleware('auth:admin')->group(function(){
    Route::view('/', 'admin.index')->name('home');

    Route::resource('/cities', 'CityController');
    Route::resource('/sellers', 'SellerController');
    Route::post('/sellers/{seller}/activate', 'SellerController@activate')->name('sellers.activate');
    Route::resource('/orders', 'OrderController');
});
