<?php

namespace Cleaf\Middleware;

use Cleaf\Config\Middleware;

class AuthMiddleware implements Middleware
{
    public function before($next)
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: /login');
            exit;
        }

        return $next();
    }
}
