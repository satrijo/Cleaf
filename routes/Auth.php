<?php

namespace Cleaf\Routes;

use Cleaf\Config\Router;
use Cleaf\Controller\AuthController;
use Cleaf\Middleware\AuthMiddleware;

class Auth
{
    public static function routes()
    {
        Router::get('/login', [AuthController::class, 'index'], [AuthMiddleware::class]);
        Router::post('/login', [AuthController::class, 'login'], [AuthMiddleware::class]);
        Router::get('/register', [AuthController::class, 'register'], [AuthMiddleware::class]);
        Router::post('/register', [AuthController::class, 'create'], [AuthMiddleware::class]);
        Router::get('/logout', [AuthController::class, 'logout'], [AuthMiddleware::class]);
    }
}