<?php 
    return  [
        'default' => 'mongodb',

        'connections' => [
            'mysql' => [
                'driver'    => 'mysql',
                'host'      => env('DB_HOST', 'localhost'),
                'database'  => env('DB_DATABASE', ''),
                'username'  => env('DB_USERNAME', ''),
                'password'  => env('DB_PASSWORD', ''),
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'strict'    => false,
            ],

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
    ];