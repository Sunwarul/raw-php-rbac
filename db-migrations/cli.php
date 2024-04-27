<?php

require_once __DIR__ . '/../core/EnvLoader.php';
require_once __DIR__ . '/../core/DatabaseConnection.php';
require_once __DIR__ . '/../core/functions.php';

class App
{
    protected DatabaseConnection $dbConnection;
    
    public function __construct()
    {
        EnvLoader::load();
        $config = [
            $_ENV['DB_HOST'],
            $_ENV['DB_PORT'],
            $_ENV['DB_NAME'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS']
        ];
        $this->dbConnection = new DatabaseConnection($config);
    }

    public function dbConn()
    {
        return $this->dbConnection->getConnection();
    }
}

$app  = new App();