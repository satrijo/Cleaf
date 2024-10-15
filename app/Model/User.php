<?php

namespace Cleaf\Model;

use Cleaf\Config\Model;

class User extends Model
{
    public function create($name, $email, $password)
    {
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        return $this->db->execute($query, [$name, $email, $password]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        return $this->db->execute($query, [$id]);
    }
}
