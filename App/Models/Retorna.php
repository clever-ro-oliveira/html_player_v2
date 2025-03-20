<?php

namespace App\Models;

class Retorna
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getNextTrack($count)
    {
        $arr = [];
        $query = "SELECT arquivo, extensao FROM arquivos ORDER BY extensao DESC";
        $result = $this->db->query($query);

        $index = 1;
        while ($row = $result->fetch_assoc()) {
            $arr[$index] = $row['arquivo'];
            $index++;
        }

        $last = array_key_last($arr);

        if ($count == 0) {
            $count = $last;
        } elseif ($count > $last) {
            $count = 1;
        }

        return [
            'next' => $count,
            'file' => $arr[$count]
        ];
    }
}
