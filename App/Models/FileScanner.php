<?php

namespace App\Models;

class FileScanner
{
    private $db;
    private $path;

    public function __construct()
    {
        $this->db = Database::getConnection();
        $this->path = realpath(__DIR__ . '/../../public/assets/midias/');
    }

    public function scanAndSync()
    {
        if (!is_dir($this->path)) {
            return "Erro: O diretório não existe!";
        }

        $files = scandir($this->path);
        $validExtensions = ['mp3', 'mp4'];
        $insertedCount = 0;
        $updatedCount = 0;
        $deletedCount = 0;

        // Marcar todos os arquivos como não verificados
        $this->db->query("UPDATE arquivos SET checked = FALSE");

        // Preparar consultas SQL
        $stmtCheck = $this->db->prepare("SELECT id FROM arquivos WHERE arquivo = ?");
        $stmtUpdate = $this->db->prepare("UPDATE arquivos SET checked = TRUE WHERE arquivo = ?");
        $stmtInsert = $this->db->prepare("INSERT INTO arquivos (arquivo, extensao, checked) VALUES (?, ?, TRUE)");

        foreach ($files as $file) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);

            if (in_array(strtolower($ext), $validExtensions)) {
                // Verificar se o arquivo já está no banco
                $stmtCheck->bind_param("s", $file);
                $stmtCheck->execute();
                $stmtCheck->store_result();

                if ($stmtCheck->num_rows > 0) {
                    // Atualizar arquivo existente para "checked = true"
                    $stmtUpdate->bind_param("s", $file);
                    $stmtUpdate->execute();
                    $updatedCount++;
                } else {
                    // Inserir novo arquivo no banco
                    $stmtInsert->bind_param("ss", $file, $ext);
                    $stmtInsert->execute();
                    $insertedCount++;
                }
            }
        }

        // Excluir registros não encontrados
        $this->db->query("DELETE FROM arquivos WHERE checked = FALSE");
        $deletedCount = $this->db->affected_rows;

        // Fechar as consultas
        $stmtCheck->close();
        $stmtUpdate->close();
        $stmtInsert->close();

        return [
            "adicionados" => $insertedCount,
            "atualizados" => $updatedCount,
            "removidos" => $deletedCount
        ];
    }
}
