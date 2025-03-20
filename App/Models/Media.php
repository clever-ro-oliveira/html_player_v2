<?php

namespace App\Models;

class Media
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAllMedia()
    {
        $stmt = $this->db->query("SELECT arquivo, extensao FROM arquivos ORDER BY extensao DESC");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}
