<?php

namespace Cleaf\Config;

class Database
{
    private $db;

    public function __construct($host, $user, $password, $dbname, $port)
    {
        $this->db = new \mysqli($host, $user, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die('Connection failed: ' . $this->db->connect_error);
        }

        $this->db->set_charset("utf8");
    }

    public function query($query)
    {
        $result = $this->db->query($query);

        if ($result === false) {
            return [];
        }

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function execute($query, $params = [])
    {
        $stmt = $this->db->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->db->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        return $stmt->affected_rows;
    }
}
