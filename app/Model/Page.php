<?php

namespace Cleaf\Model;

use Cleaf\Config\Model;

class Page extends Model
{
    public function create($title, $slug, $description, $user_id)
    {
        $query = "INSERT INTO pages (title, slug, description, user_id) VALUES (?, ?, ?, ?)";
        return $this->db->execute($query, [$title, $slug, $description, $user_id]);
    }

    public function find($id)
    {
        $query = "SELECT * FROM pages WHERE id = ?";
        $result = $this->db->query($query, [$id]);
        return !empty($result) ? $result[0] : null;
    }

    public function findBySlug($slug)
    {
        $query = "SELECT * FROM pages WHERE slug = ?";
        $result = $this->db->query($query, [$slug]);
        return !empty($result) ? $result[0] : null;
    }

    public function findByUserId($user_id)
    {
        $query = "SELECT * FROM pages WHERE user_id = ?";
        return $this->db->query($query, [$user_id]);
    }


    public function findContentsByPageId($page_id)
    {
        $query = "SELECT * FROM contents WHERE page_id = ? ORDER BY created_at DESC LIMIT 10";
        return $this->db->query($query, [$page_id]);
    }

    public function all()
    {
        $query = "SELECT * FROM pages";
        return $this->db->query($query);
    }

    public function update($id, $title, $slug, $description)
    {
        $query = "UPDATE pages SET title = ?, slug = ?, description = ? WHERE id = ?";
        return $this->db->execute($query, [$title, $slug, $description, $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM pages WHERE id = ?";
        return $this->db->execute($query, [$id]);
    }
}
