<?php

Route::resource("offers", "OfferAPIController");

Route::resource("packages", "PackageAPIController");

Route::resource("settings", "SettingAPIController");

Route::get("foods/specials", "FoodAPIController@specials");

Route::get("foods/sliders", "FoodAPIController@sliders");
Route::get("foods/like/{id}", "FoodAPIController@like");
Route::get("foods/dislike/{id}", "FoodAPIController@dislike");

Route::resource("foods", "FoodAPIController");

Route::resource("customers", "CustomerAPIController");
Route::post("categories/cats", "CategoryAPIController@showCategories");
Route::resource("categories", "CategoryAPIController");

Route::resource("carts", "CartAPIController");

Route::resource("bookings", "BookingAPIController");

Route::resource("contacts", "ContactAPIController");