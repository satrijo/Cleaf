<?php

namespace Cleaf\Config;

class App
{
    public static $config = [
        'DATABASE_NAME' => $_ENV['DATABASE_NAME'] ?? 'todo',
        'DATABASE_USER' => $_ENV['DATABASE_USER'] ?? 'root',
        'DATABASE_PASSWORD' => $_ENV['DATABASE_PASSWORD'] ?? 'root',
        'DATABASE_HOST' => $_ENV['DATABASE_HOST'] ?? 'localhost',
        'DATABASE_PORT' => $_ENV['DATABASE_PORT'] ?? '3306',
    ];

    public static function config($key)
    {
        return self::$config[strtoupper($key)] ?? null;
    }
}