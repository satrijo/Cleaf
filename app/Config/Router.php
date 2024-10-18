<?php

namespace Cleaf\Config;

class Router
{
    private static $routes = [];
    private static $methods = ['get', 'post', 'put', 'delete'];

    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, self::$methods)) {
            self::$routes[$name][$arguments[0]] = [
                'callable' => $arguments[1],
                'middleware' => $arguments[2] ?? []
            ];
        }
    }

    public static function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = rtrim($path, '/') ?: '/';
        $method = strtolower($_SERVER['REQUEST_METHOD'] ?? 'get');

        error_log("Path: $path, Method: $method");

        foreach (self::$routes[$method] as $route => $callable) {
            if (self::matchRoute($route, $path)) {
                self::handleRoute($callable['callable'], $callable['middleware'], $path);
                return;
            }
        }

        error_log("Route not found: $path");
        http_response_code(404);
        echo 'Page not found';
    }

    private static function matchRoute($route, $path)
    {
        $routePattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);
        $routePattern = "#^" . $routePattern . "$#";

        return preg_match($routePattern, $path);
    }

    private static function handleRoute($callable, $middleware, $path)
    {
        $next = function () use ($callable, $path) {
            $routePattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $path);
            $routePattern = "#^" . $routePattern . "$#";

            if (preg_match($routePattern, $path, $matches)) {
                array_shift($matches);
                $params = array_map(function ($match) {
                    return $match === '' ? null : $match;
                }, $matches);

                if (is_array($callable)) {
                    $className = $callable[0];
                    $methodName = $callable[1];
                    $instance = new $className();
                    return call_user_func_array([$instance, $methodName], $params);
                } else {
                    return call_user_func_array($callable, $params);
                }
            }
        };

        if (!empty($middleware)) {
            $middlewareChain = array_reduce(
                array_reverse($middleware),
                function ($next, $middleware) {
                    return function () use ($middleware, $next) {
                        $middlewareInstance = new $middleware();
                        return $middlewareInstance->before($next);
                    };
                },
                $next
            );

            $result = $middlewareChain();
            if ($result !== null) {
                echo $result;
            }
        } else {
            $result = $next();
            if ($result !== null) {
                echo $result;
            }
        }
    }
}