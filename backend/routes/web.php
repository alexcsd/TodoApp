<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/todos', 'todoController@index');
$router->post('/api/todos', 'todoController@store');
$router->get('/api/todo/{_id}', 'todoController@show');
$router->put('/api/todo/{_id}', 'todoController@update');
$router->delete('/api/todo/{_id}', 'todoController@destroy');
