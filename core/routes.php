<?php

$routes = [
    'GET /' => 'HomeController@index',
    'GET /login' => 'HomeController@login',
    'GET /register' => 'HomeController@register',
    'POST /register' => 'AuthController@register',
    'POST /login' => 'AuthController@login',
    'GET /todos' => 'TodoController@index',
    'GET /todos/(\d+)' => 'TodoController@show',
    'POST /todos' => 'TodoController@store',
    'PUT /todos/(\d+)' => 'TodoController@update',
    'DELETE /todos/(\d+)' => 'TodoController@destroy'
];
