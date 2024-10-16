<?php

namespace Cleaf\Config;

use Cleaf\Config\App;
use Cleaf\Config\ConnectionPool;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = ConnectionPool::getInstance()->getConnection();
    }

    public function __destruct()
    {
        ConnectionPool::getInstance()->releaseConnection($this->db);
    }
}
