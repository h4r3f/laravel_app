<?php

Route::resource('offers', 'OfferController');

Route::get('offers/{id}/delete', [
    'as' => 'offers.delete',
    'uses' => 'OfferController@destroy',
]);


Route::resource('packages', 'PackageController');

Route::get('packages/{id}/delete', [
    'as' => 'packages.delete',
    'uses' => 'PackageController@destroy',
]);

Route::get('settings/adminemail', 'SettingController@getAdminEmail');
Route::post('settings/adminemail', 'SettingController@postAdminEmail');

Route::resource('settings', 'SettingController');

Route::get('settings/{id}/delete', [
    'as' => 'settings.delete',
    'uses' => 'SettingController@destroy',
]);


Route::resource('foods', 'FoodController');

Route::get('foods/{id}/delete', [
    'as' => 'foods.delete',
    'uses' => 'FoodController@destroy',
]);


Route::resource('customers', 'CustomerController');

Route::get('customers/{id}/delete', [
    'as' => 'customers.delete',
    'uses' => 'CustomerController@destroy',
]);


Route::resource('categories', 'CategoryController');

Route::get('categories/{id}/delete', [
    'as' => 'categories.delete',
    'uses' => 'CategoryController@destroy',
]);


Route::resource('carts', 'CartController');

Route::get('carts/{id}/delete', [
    'as' => 'carts.delete',
    'uses' => 'CartController@destroy',
]);

Route::resource('bookings', 'BookingController');

Route::get('bookings/{id}/delete', [
    'as' => 'bookings.delete',
    'uses' => 'BookingController@destroy',
]);

Route::get('bookings/{id}/confirmed', [
    'as' => 'bookings.confirmed',
    'uses' => 'BookingController@confirmed',
]);

Route::resource('contacts', 'ContactController');

Route::get('contacts/{id}/delete', [
    'as' => 'contacts.delete',
    'uses' => 'ContactController@destroy',
]);
