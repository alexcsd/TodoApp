<?php 
    return  [
        'default' => 'mongodb',

        'connections' => [
            'mongodb' => array(
                'driver'   => 'mongodb',
                'host'     => env('MONGODB_HOST', 'localhost'),
                'port'     => env('MONGODB_PORT', 27017),
                'database' => env('MONGODB_DATABASE', ''),
                'username' => env('MONGODB_USERNAME', ''),
                'password' => env('MONGODB_PASSWORD', ''),
                'options' => array(
                    'db' => env('MONGODB_AUTHDATABASE', '') //Sets the auth DB
                )
            ),

        ],
        'migrations' => 'migrations',

    ];