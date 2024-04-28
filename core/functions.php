<?php

function view($viewName)
{
    include __DIR__ . '/../views/_header.php';
    include __DIR__ . '/../views/' . $viewName . '.php';
    include __DIR__ . '/../views/_footer.php';
}

function auth()
{
    return isset($_SESSION['user']);
}

function guest()
{
    return !isset($_SESSION['user']);
}

function auth_user($key = null)
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']['password']);
        if (isset($key)) {
            return $_SESSION['user'][$key];
        } else {
            return $_SESSION['user'];
        }
    }
}

function redirect($path)
{
    header('Location: ' . $path);
}
