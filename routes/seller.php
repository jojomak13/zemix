<?php

Auth::routes();

Route::middleware('auth:seller')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/edit-profile', 'HomeController@edit')->name('edit');
    Route::patch('/edit-profile', 'HomeController@update')->name('update');

    Route::get('/balance', 'HomeController@balance')->name('balance');

    Route::get('/orders/create', 'OrderController@create')->name('orders.create');
    Route::post('/orders', 'OrderController@store')->name('orders.store');
    Route::get('/orders/{order}/update', 'OrderController@edit')->name('orders.edit');
    Route::Patch('/orders/{order}', 'OrderController@update')->name('orders.update');
    Route::post('/orders/print', 'OrderController@print')->name('orders.print');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');

    Route::post('/orders/upload', 'OrderController@upload')->name('orders.upload');

    Route::get('/cities', 'HomeController@cities')->name('cities');
});
