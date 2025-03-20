<?php

namespace App\Controllers;

class PlayerController
{

    public function play($arquivo, $count)
    {

        if (!$arquivo) {
            echo "Erro: arquivo não encontrado!";
            return;
        }

        // Chama a view passando os dados
        include __DIR__ . '/../Views/player.php';
    }
}
