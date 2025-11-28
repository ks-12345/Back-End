<?php

namespace Aula_17;

use PDO;

require_once 'Livros.php';
require_once 'Connection.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS livros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(255) NOT NULL UNIQUE,
                genero VARCHAR(100) NOT NULL,
                autor VARCHAR(255) NOT NULL,
                ano INT NOT NULL,
                qtde INT NOT NULL
            )
        ");
    }
    

    // CREATE
    public function criarLivros(Livros $livro) {
        $stmt = $this->conn->prepare("
            INSERT INTO livros (titulo, genero, autor, ano, qtde)
            VALUES (:titulo, :genero, :autor, :ano, :qtde)");
        $stmt->execute([
            ':titulo' => trim($livro->getTitulo()),
            ':genero' => trim($livro->getGenero()),
            ':autor' => trim($livro->getAutor()),
            ':ano' => trim($livro->getAno()),
            ':qtde' => trim($livro->getQtde())
        ]);
    }

    // READ
    public function lerLivros() {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY titulo");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Livros(
                $row['titulo'],
                $row['genero'],
                $row['autor'],
                $row['ano'],
                $row['qtde']
            );
        }
        return $result;
    }

    // UPDATE
    public function atualizarLivro($tituloOriginal, $novoTitulo, $genero, $autor, $ano, $qtde) {
        $stmt = $this->conn->prepare("
            UPDATE livros
            SET titulo = :novoTitulo, genero = :genero, autor = :autor, ano = :ano, qtde = :qtde
            WHERE titulo = :tituloOriginal
        ");
        $stmt->execute([
            ':novoTitulo' => $novoTitulo,
            ':genero' => $genero,
            ':autor' => $autor,
            ':ano' => $ano,
            ':qtde' => $qtde,
            ':tituloOriginal' => $tituloOriginal
        ]);
    }

    // DELETE
    public function excluirLivro($titulo) {
        $stmt = $this->conn->prepare("DELETE FROM livros WHERE titulo = :titulo");
        $stmt->execute([':titulo' => $titulo]);
    }

    // BUSCAR POR NOME
    public function buscarPorTitulo($titulo) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE titulo = :titulo LIMIT 1");
        $stmt->execute([':titulo' => $titulo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Livros(
                $row['titulo'],
                $row['genero'],
                $row['autor'],
                $row['ano'],
                $row['qtde']
            );
        }
        return null;
    }

     public function buscarLivros($termo) {
        $stmt = $this->conn->prepare("
            SELECT * FROM livros 
            WHERE titulo LIKE :termo 
               OR autor LIKE :termo 
               OR genero LIKE :termo 
            ORDER BY titulo
        ");
        $termoBusca = '%' . $termo . '%';
        $stmt->execute([':termo' => $termoBusca]);
        
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Livros(
                $row['titulo'],
                $row['genero'],
                $row['autor'],
                $row['ano'],
                $row['qtde']
            );
        }
        return $result;
    }
}