<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server/PHP Requirements
    |--------------------------------------------------------------------------
    |
    | These are the extensions/PHP server requirements.
    |
    */
    'requirements' => [
        'openssl',
        'pdo',
        'mbstring',
        'tokenizer'
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | These are default permissions laravel needs.
    |
    */
    'permissions' => [
        'storage/app/'           => '775',
        'storage/framework/'     => '775',
        'storage/logs/'          => '775',
        'bootstrap/cache/'       => '775'
    ]
];