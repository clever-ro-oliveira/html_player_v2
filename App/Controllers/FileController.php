<?php

namespace App\Controllers;

use App\Models\FileScanner;

class FileController
{
    public function syncFiles()
    {
        $fileScanner = new FileScanner();
        $result = $fileScanner->scanAndSync();
        include __DIR__ . "/../Views/atualiza.php";
    }
}
