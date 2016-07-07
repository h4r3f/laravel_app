<?php

Route::group(['prefix' => 'install', 'as' => 'WebInstaller::', 'middleware' => 'notInstalled'], function()
{

    Route::get('/', [
        'as' => 'install',
        'uses' => 'WebInstallerController@install'
    ]);

    Route::get('requirements', [
        'as' => 'requirements',
        'uses' => 'WebInstallerController@requirements'
    ]);

    Route::get('database', [
        'as' => 'database',
        'uses' => 'WebInstallerController@database'
    ]);

});
