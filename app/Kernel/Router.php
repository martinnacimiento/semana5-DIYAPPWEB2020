<?php

namespace App\Kernel;

class Router
{
    static $routes = [];

    static function get($path, $action)
    {
        self::addRoute('GET', $path, $action);
    }

    static function post($path, $action)
    {
        self::addRoute('POST', $path, $action);
    }

    static function update($path, $action)
    {
        self::addRoute('PUT', $path, $action);
    }

    static function delete($path, $action)
    {
        self::addRoute('DELETE', $path, $action);
    }

    private static function addRoute($method, $path, $action)
    {
        self::$routes[$method][$path] = "\\App\\Controllers\\" . $action;
    }

    static function routing($uri, $method = 'GET')
    {
        $action = self::$routes[$method]["$uri"];
        $pos_arroba = strpos($action, "@");
        $controller = substr($action, 0, $pos_arroba);
        $method = substr($action, $pos_arroba + 1);
        $c = new $controller((object) $_REQUEST);
        $c->$method((object) $_REQUEST);
    }
}
