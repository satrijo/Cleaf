<?php

namespace Cleaf\Model;

use Cleaf\Config\Model;

class Content extends Model
{
    public function create($page_id, $title, $url)
    {
        $query = "INSERT INTO contents (page_id, title, url) VALUES (?, ?, ?)";
        return $this->db->execute($query, [$page_id, $title, $url]);
    }

    public function find($id)
    {
        $query = "SELECT * FROM contents WHERE id = ?";
        $result = $this->db->query($query, [$id]);
        return !empty($result) ? $result[0] : null;
    }

    public function findByPageId($page_id)
    {
        $query = "SELECT * FROM contents WHERE page_id = ?";
        return $this->db->query($query, [$page_id]);
    }

    public function update($id, $title, $url)
    {
        $query = "UPDATE contents SET title = ?, url = ? WHERE id = ?";
        return $this->db->execute($query, [$title, $url, $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM contents WHERE id = ?";
        return $this->db->execute($query, [$id]);
    }

    public function deleteByPageId($page_id)
    {
        $query = "DELETE FROM contents WHERE page_id = ?";
        return $this->db->execute($query, [$page_id]);
    }

    public function all()
    {
        $query = "SELECT * FROM contents";
        return $this->db->query($query);
    }
}
