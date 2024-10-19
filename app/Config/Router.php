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
            $params = self::matchRoute($route, $path);
            if ($params !== false) {
                error_log("Route matched: $route");
                error_log("Params: " . print_r($params, true));
                self::handleRoute($callable['callable'], $callable['middleware'], $params);
                return;
            }
        }

        error_log("Route not found: $path");
        http_response_code(404);
        View::render('404');
    }

    private static function matchRoute($route, $path)
    {
        $routePattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);
        $routePattern = "#^" . $routePattern . "$#";

        if (preg_match($routePattern, $path, $matches)) {
            array_shift($matches);
            return array_map(function ($match) {
                return $match === '' ? null : $match;
            }, $matches);
        }

        return false;
    }

    private static function handleRoute($callable, $middleware, $params)
    {
        $next = function () use ($callable, $params) {
            error_log("Calling controller with params: " . print_r($params, true));

            if (is_array($callable)) {
                $className = $callable[0];
                $methodName = $callable[1];
                $instance = new $className();
                return call_user_func_array([$instance, $methodName], $params);
            } else {
                return call_user_func_array($callable, $params);
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
