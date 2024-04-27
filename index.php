<?php

require_once './core/EnvLoader.php';
require_once './core/Router.php';
require_once './core/functions.php';

class App
{
    protected DatabaseConnection $dbConnection;
    
    public function __construct()
    {
        EnvLoader::load();
        Router::handle();
    }
}

$app  = new App();