<?php

Auth::routes();

Route::middleware('auth:seller')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
});
