<?php

require_once './core/EnvLoader.php';
require_once './core/Router.php';
require_once './core/functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
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
