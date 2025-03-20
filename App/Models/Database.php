<?php

namespace App\Models;

use mysqli;
use Exception;

class Database
{
    private static ?mysqli $connection = null;

    private function __construct() {}

    public static function getConnection(): mysqli
    {
        if (self::$connection === null) {
            self::$connection = new mysqli("db", "db", "db", "db");

            if (self::$connection->connect_error) {
                throw new Exception("Falha na conexão: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
