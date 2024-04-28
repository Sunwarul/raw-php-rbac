<?php

require_once './core/Validator.php';
require_once __DIR__ . '/../services/AuthService.php';

class AuthController
{
    private AuthService $authService;
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function register()
    {
        $userInfo = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $isValid = Validator::validate([
            $userInfo['name'] => 'string',
            $userInfo['email'] => 'email',
            $userInfo['password'] => 'string',
        ]);

        if($isValid) {
            $userInfo['password'] = password_hash($userInfo['password'], PASSWORD_DEFAULT);
            $this->authService->registerUser($userInfo);
        }
        return view('register');
    }

    public function login()
    {
        $loginInfo = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $isValid = Validator::validate([
            $loginInfo['email'] => 'email',
            $loginInfo['password'] =>'string',
        ]);
        if($isValid) {
            $user = $this->authService->loginUser($loginInfo);
            if($user) {
                $_SESSION['user'] = $user;
                header('Location: /dashboard');
                var_dump($user);
            } else {
                $_SESSION['user'] = null;
                $_SESSION['error'] = 'Login failed. Invalid email or password';
            }
        }
        return view('login');
    }

    public function logout()
    {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            $_SESSION['success'] = 'Log out successful!';
        }
        header('Location: /');
    }
}
