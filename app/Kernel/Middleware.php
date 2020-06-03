<?php

namespace App\Kernel;

use Closure;

class Middleware
{
    private static $middlewares;

    public static function addMiddleware(Closure $middleware)
    {
        array_push(self::$middlewares, $middleware);
    }

    public static function runMiddlewares($request, Closure $next)
    {
        foreach (self::$middlewares as $middleware) {
            $middleware($request);
        }
        return $next($request);
    }
}
