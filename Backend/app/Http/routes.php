<?php

@include_once('installerRoutes.php');


Route::group(['middleware' => 'isInstalled'], function() {

    Route::get('home', function() {
        return redirect('/');
    });

    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
    /**
     * API Routes
     */
    Route::group(['prefix' => Config::get('generator.api_prefix'), 'namespace' => 'API'], function () {
        Route::group(['prefix' => Config::get('generator.api_version'), 'middleware' => 'cors'], function () {
            Route::post('login', '\App\Http\Controllers\Auth\ApiAuthController@Login');

//            Route::group(['middleware' => 'jwt.auth'], function(){
            @include_once('apiRoutes.php');
//            }); 
        });
    });


    /**
     * Admin Crud routes
     */
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', function() {
            return view('index');
        });
        @include_once('crudRoutes.php');
    });
});
