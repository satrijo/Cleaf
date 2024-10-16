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

    public function find($id)
    {
        $query = "SELECT * FROM users WHERE id = ?";
        $result = $this->db->query($query, [$id]);
        return !empty($result) ? $result[0] : null;
    }

    public function all()
    {
        $query = "SELECT * FROM users";
        return $this->db->query($query);
    }

    public function update($id, $name, $email, $password)
    {
        $query = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
        return $this->db->execute($query, [$name, $email, $password, $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        return $this->db->execute($query, [$id]);
    }
}