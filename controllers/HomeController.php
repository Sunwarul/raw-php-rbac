<?php

class HomeController
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }
}
