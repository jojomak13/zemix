<?php


Auth::routes();

Route::middleware('auth:admin')->group(function(){
    Route::view('/', 'admin.index')->name('home');

    Route::resource('/cities', 'CityController');
    
    Route::resource('/sellers', 'SellerController');
    Route::post('/sellers/{seller}/activate', 'SellerController@activate')->name('sellers.activate');
    Route::post('/sellers/{seller}/transaction', 'SellerController@transaction')->name('sellers.transaction');

    // Orders
    Route::resource('/orders', 'OrderController')->except(['create', 'store']);
    Route::post('/orders/print', 'OrderController@print')->name('orders.print');
    Route::post('/orders/updateStatus', 'OrderController@updateStatus')->name('orders.updateStatus');
    Route::get('/orders/{order}/history', 'OrderController@history');
    
    Route::resource('/drivers', 'DriverController');
    Route::resource('/admins', 'AdminController');
    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');

    // Roles & Permissions
    Route::resource('/roles', 'RoleController');
    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
});
