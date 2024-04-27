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
        
    }
}
