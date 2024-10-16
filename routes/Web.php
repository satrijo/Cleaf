<?php

namespace Cleaf\Routes;

use Cleaf\Config\Router;
use Cleaf\Controller\UserController;
use Cleaf\Middleware\AuthMiddleware;

class Web
{
    public static function routes()
    {
        Router::get('/', [UserController::class, 'index']);
        Router::get('/{name}', [UserController::class, 'index']);
        Router::post('/', [UserController::class, 'index'], [AuthMiddleware::class]);
    }

    public static function run()
    {
        self::routes();
        Router::run();
    }
}
