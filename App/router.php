<?php

use App\Controllers\HomeController;
use App\Controllers\PlayerController;
use App\Controllers\RetornaController;
use App\Controllers\FileController;

$request = $_SERVER['REQUEST_URI'];
$baseRoute = '/';

if (preg_match('/^\/([a-zA-Z0-9\-]+)(\/.*)?$/', $request, $matches)) {
    $baseRoute = $matches[1];
    $params = isset($matches[2]) ? $matches[2] : '';
}

// Mapeando a URL para o controller
switch ($baseRoute) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'player':
        if (preg_match('/^\/([^\/]+)\/([0-9]+)$/', $params, $playerMatches)) {
            $arquivo = $playerMatches[1]; // Nome do arquivo
            $count = $playerMatches[2];  // Contador

            // Chama o controlador Player com os parâmetros
            $controller = new PlayerController();
            $controller->play($arquivo, $count);
        } else {
            // Caso a URL não tenha o formato esperado
            header("HTTP/1.0 400 Bad Request");
            echo "Erro: Parâmetros inválidos para o player!";
        }
        break;
    case 'retorna':
        $controller = new RetornaController();
        $controller->retorna(str_replace('/', '', $params));
        break;
    case 'sync-files':
        $controller = new FileController();
        $controller->syncFiles();
        break;
    default:
        // Página não encontrada
        header("HTTP/1.0 404 Not Found");
        echo "404 - Página não encontrada!";
        break;
}
