<?php

namespace Cleaf\Routes;

use Cleaf\Config\Router;
use Cleaf\Controller\UserController;
use Cleaf\Middleware\AuthMiddleware;

class Web
{
    public static function routes()
    {
        Router::get('/', [UserController::class, 'index'], [AuthMiddleware::class]);
        Router::get('/{name}', [UserController::class, 'index']);
    }

    public static function run()
    {
        Auth::routes();
        // Add your routes above this line
        self::routes();
        Router::run();
    }
}
