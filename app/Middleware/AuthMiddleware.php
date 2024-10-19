<?php

namespace Cleaf\Middleware;

use Cleaf\Config\Middleware;

class AuthMiddleware implements Middleware
{
    public function before($next)
    {
        if (isset($_SESSION['auth']) && ($_SERVER['REQUEST_URI'] === '/login' || $_SERVER['REQUEST_URI'] === '/register')) {
            header('Location: /');
            exit;
        }

        if (!isset($_SESSION['auth']) && ($_SERVER['REQUEST_URI'] !== '/login' && $_SERVER['REQUEST_URI'] !== '/register')) {
            header('Location: /login');
            exit;
        }

        $next();
        return null;
    }
}