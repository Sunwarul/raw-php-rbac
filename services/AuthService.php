<?php

require_once __DIR__ . '/../core/DatabaseConnection.php';
require_once __DIR__ . '/../core/Logger.php';

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
        try {
            $statement->execute();
            $_SESSION['success'] = 'User registered!';
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            Logger::log($e->getMessage());
            return false;
        }
    }

    public function loginUser($userInfo)
    {
        $conn = $this->db->getConnection();
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(':email', $userInfo['email']);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if (password_verify($userInfo['password'], $user['password'])) {
            Logger::info("New Login");
            Logger::log($user);
            return $user;
        }
        return null;
    }

    public function updateUser($userInfo)
    {
        $conn = $this->db->getConnection();
        $statement = $conn->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE email = :email");
        $statement->bindParam(':name', $userInfo['name']);
        $statement->bindParam(':email', $userInfo['email']);
        $statement->bindParam(':password', $userInfo['password']);
        try {
            $statement->execute();
            $updatedUser = $conn->query("SELECT * FROM users WHERE email = '{$userInfo['email']}'")->fetch(PDO::FETCH_ASSOC);
            if ($updatedUser) {
                $_SESSION['user'] = $updatedUser;
                $_SESSION['success'] = 'User Profile Updated!';
            }
            return true;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            Logger::log($e->getMessage());
            return false;
        }
    }
}
