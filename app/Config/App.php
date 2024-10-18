<?php

namespace Cleaf\Config;

class App
{
    public static $config = [
        'DATABASE_NAME' => 'cleaf',
        'DATABASE_USER' => 'root',
        'DATABASE_PASSWORD' => 'root',
        'DATABASE_HOST' => '127.0.0.1',
        'DATABASE_PORT' => '3306',
    ];

    public static function config($key)
    {
        return self::$config[strtoupper($key)] ?? null;
    }
}
