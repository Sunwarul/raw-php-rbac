<?php

$routes = [
    'GET /' => 'HomeController@index',
    'GET /dashboard' => 'DashboardController@index',
    'GET /profile' => 'ProfileController@index',
    'POST /update-profile' => 'ProfileController@updateProfile',
    'GET /login' => 'HomeController@login',
    'GET /register' => 'HomeController@register',
    'POST /register' => 'AuthController@register',
    'POST /login' => 'AuthController@login',
    'POST /logout' => 'AuthController@logout',
    'GET /todos' => 'TodoController@index',
    'GET /todos/(\d+)' => 'TodoController@show',
    'POST /todos' => 'TodoController@store',
    'PUT /todos/(\d+)' => 'TodoController@update',
    'DELETE /todos/(\d+)' => 'TodoController@destroy'
];
