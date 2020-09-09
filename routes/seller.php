<?php

Auth::routes();

Route::middleware('auth:seller')->group(function(){
    Route::view('/', 'seller.index')->name('home');
});
