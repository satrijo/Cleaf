<?php

namespace Cleaf\Config;

use Cleaf\Config\App;
use Cleaf\Config\Database;

class Model
{
    protected $db;

    public function __construct()
    {
        $host = App::config('DATABASE_HOST');
        $user = App::config('DATABASE_USER');
        $password = App::config('DATABASE_PASSWORD');
        $dbname = App::config('DATABASE_NAME');
        $port = App::config('DATABASE_PORT');

        $this->db = new Database($host, $user, $password, $dbname, $port);
    }
}
