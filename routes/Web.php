<?php

namespace Cleaf\Routes;

use Cleaf\Config\Router;
use Cleaf\Controller\UserController;
use Cleaf\Controller\PageController;
use Cleaf\Controller\ContentController;
use Cleaf\Middleware\AuthMiddleware;

class Web
{
    public static function routes()
    {
        Router::get('/', [UserController::class, 'index'], [AuthMiddleware::class]);

        // pages
        Router::get('/pages', [PageController::class, 'index'], [AuthMiddleware::class]);
        Router::post('/pages/create', [PageController::class, 'create'], [AuthMiddleware::class]);
        Router::post('/pages/delete/{id}', [PageController::class, 'delete'], [AuthMiddleware::class]);

        // content
        Router::get('/{name}/content', [ContentController::class, 'index'], [AuthMiddleware::class]);
        Router::post('/{name}/content/create', [ContentController::class, 'create'], [AuthMiddleware::class]);
        Router::post('/{name}/content/delete/{id}', [ContentController::class, 'delete'], [AuthMiddleware::class]);

        Router::get('/pricing', [PageController::class, 'underconstruction'], [AuthMiddleware::class]);
        Router::get('/contact', [PageController::class, 'underconstruction'], [AuthMiddleware::class]);
        Router::get('/{name}', [PageController::class, 'show']);
    }

    public static function run()
    {
        Auth::routes();
        // Add your routes above this line
        self::routes();
        Router::run();
    }
}
