<?php

include_once __DIR__ . '/routes.php';

class Router
{
    public static $routes;

    public static function handle()
    {
        self::$routes = $GLOBALS['routes'];
        $path = $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'];
        foreach (self::$routes as $route => $controllerAction) {
            [$method, $pattern] = explode(' ', $route);
            if ($method == $_SERVER['REQUEST_METHOD'] && preg_match('#^' . $pattern . '$#', $_SERVER['REQUEST_URI'], $matches)) {
                $parts = explode('@', $controllerAction);
                $controller = $parts[0];
                $action = $parts[1];
                if (isset($controller) && isset($action)) {
                    require_once __DIR__ . "/../controllers/$controller.php";
                    $controllerInstance = new $controller();
                    $controllerInstance->{$action}();
                    break;
                }
            }
        }
    }
}
