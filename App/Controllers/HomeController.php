<?php

namespace App\Controllers;

use App\Models\Media;

class HomeController
{
    public function index()
    {
        $mediaModel = new Media();
        $medias = $mediaModel->getAllMedia();
        include __DIR__ . "/../Views/home.php";
    }
}
