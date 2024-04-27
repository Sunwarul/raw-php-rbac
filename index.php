<?php

require_once './core/EnvLoader.php';
require_once './core/Router.php';
require_once './core/functions.php';

date_default_timezone_set('Asia/Dhaka');
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