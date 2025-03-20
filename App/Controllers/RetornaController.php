<?php

namespace App\Controllers;

use App\Models\Retorna;

class RetornaController
{

    public function retorna($count)
    {
        $retorna = new Retorna();
        $data = $retorna->getNextTrack($count);

        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
