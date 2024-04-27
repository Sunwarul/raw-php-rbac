<?php

require_once __DIR__ . '/../core/DatabaseConnection.php';

class AuthService
{
    private $db;
    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function registerUser($userInfo)
    {
        $conn = $this->db->getConnection();
        $statement = $conn->prepare("INSERT INTO users(name, email, password) VALUES(:name, :email, :password)");
        $statement->bindParam(':name', $userInfo['name']);
        $statement->bindParam(':email', $userInfo['email']);
        $statement->bindParam(':password', $userInfo['password']);
        if($statement->execute()) {
            $_SESSION['success'] = 'User registered!';
            return true;
        } else {
            return false;
        }
    }
}
