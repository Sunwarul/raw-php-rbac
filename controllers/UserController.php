<?php

require_once __DIR__ . '/../core/Validator.php';
require_once __DIR__ . '/../core/DatabaseConnection.php';

class UserController
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new DatabaseConnection)->getConnection();
    }

    public function index()
    {
        authorize();
        $users = $this->conn->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
        return view('users/index', ['users' => $users]);
    }
}
