<?php

require_once __DIR__ . '/../core/Validator.php';
require_once __DIR__ . '/../services/AuthService.php';

class ProfileController
{
    private AuthService $authService;
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function index()
    {
        authorize();
        return view('profile');
    }

    public function updateProfile()
    {
        $userInfo = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $isValid = Validator::validate($userInfo, [
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',
        ]);

        if ($isValid) {
            $userInfo['password'] = password_hash($userInfo['password'], PASSWORD_DEFAULT);
            $isUpdated = $this->authService->updateUser($userInfo);
        }
        redirect('/profile');
    }
}
