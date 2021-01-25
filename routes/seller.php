<?php

Auth::routes();

Route::middleware('auth:seller')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/edit-profile', 'HomeController@edit')->name('edit');
    Route::patch('/edit-profile', 'HomeController@update')->name('update');

    Route::get('/balance', 'HomeController@balance')->name('balance');

    Route::get('/orders/create', 'OrderController@create')->name('orders.create');
    Route::post('/orders', 'OrderController@store')->name('orders.store');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
});
