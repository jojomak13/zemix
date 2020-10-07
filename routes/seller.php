<?php

Auth::routes();

Route::middleware('auth:seller')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');

    Route::get('/orders/create', 'Ordercontroller@create')->name('orders.create');
    Route::post('/orders', 'Ordercontroller@store')->name('orders.store');
    Route::get('/orders/{order}', 'Ordercontroller@show')->name('orders.show');
});
