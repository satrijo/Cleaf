<?php

namespace Cleaf\Config;

class ConnectionPool
{
    private static $instance = null;
    private $pool = [];
    private $maxConnections;
    private $createdConnections = 0;

    private function __construct($maxConnections)
    {
        $this->maxConnections = $maxConnections;
    }

    public static function getInstance($maxConnections = 10)
    {
        if (self::$instance === null) {
            self::$instance = new self($maxConnections);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        if (count($this->pool) > 0) {
            return array_pop($this->pool);
        } elseif ($this->createdConnections < $this->maxConnections) {
            $this->createdConnections++;
            return new Database();
        }

        throw new \Exception('No available connections in the pool.');
    }

    public function releaseConnection(Database $db)
    {
        $this->pool[] = $db;
    }
}
