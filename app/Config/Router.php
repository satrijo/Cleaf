<?php

namespace Cleaf\Config;

class Router
{
    private static $routes = [];

    private static $methods = ['get', 'post', 'put', 'delete'];

    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, self::$methods)) {
            self::$routes[$name][$arguments[0]] = $arguments[1];
            self::$routes[$name][$arguments[0]]['middleware'] = $arguments[2] ?? [];
        }
    }

    public static function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = rtrim($path, '/') ?: '/';
        $method = strtolower($_SERVER['REQUEST_METHOD'] ?? 'get');

        foreach (self::$routes[$method] as $route => $callable) {

            if ($route !== $path) {
                continue;
            }

            $next = function () use ($callable, $route, $path) {
                $routePattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)?', $route);
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
                        call_user_func_array([$instance, $methodName], $params);
                    } else {
                        call_user_func_array($callable, $params);
                    }
                }
            };

            if (!empty($callable['middleware'])) {
                $middlewareChain = array_reduce(
                    array_reverse($callable['middleware']),
                    function ($next, $middleware) {
                        return function () use ($middleware, $next) {
                            $middlewareInstance = new $middleware();
                            return $middlewareInstance->before($next);
                        };
                    },
                    $next
                );

                $middlewareChain();
            } else {
                $next();
            }

            return;
        }

        http_response_code(404);
        echo 'Page not found';
    }
}
