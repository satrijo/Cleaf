<?php

namespace Cleaf\Config;

class Database
{
    private $db;

    public function __construct()
    {
        $host = App::config('DATABASE_HOST');
        $user = App::config('DATABASE_USER');
        $password = App::config('DATABASE_PASSWORD');
        $dbname = App::config('DATABASE_NAME');
        $port = App::config('DATABASE_PORT');

        $this->db = new \mysqli($host, $user, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die('Connection failed: ' . $this->db->connect_error);
        }

        $this->db->set_charset("utf8");
    }

    public function query($query, $params = [])
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
        $result = $stmt->get_result();

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
