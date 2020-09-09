<?php


Auth::routes();

Route::middleware('auth:admin')->group(function(){
    Route::view('/', 'admin.index')->name('home');
});
