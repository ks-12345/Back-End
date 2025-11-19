<?php
namespace Aula_17;

require_once __DIR__. "\\..\\Model\\LivroDAO.php";
require_once __DIR__. "\\..\\Model\\Livros.php";

class LivroController {
    private $dao;

    public function __construct() {
        $this->dao = new LivroDAO();
    }

    //lista todas as livros 
    public function ler() {
        return $this->dao->lerLivros();

    }

    //cadastra nova livro

    public function criar($titulo,$genero,$autor,$ano,$qtde) {
        $id = time();
        $livro = new Livros( $titulo, $genero, $autor, $ano, $qtde);
        $this->dao->criarLivros($livro);

    }

    // atualiza livro existente
    public function atualizar($tituloOriginal, $novoTitulo, $genero, $autor, $ano, $qtde) {
        $this->dao->atualizarLivro($tituloOriginal, $novoTitulo, $genero, $autor, $ano, $qtde);
    }

    public function deletar($titulo) {
        $this->dao->excluirLivro($titulo);
    }

    // editar mantém o mesmo titulo, atualiza os outros campos
    public function editar($titulo, $genero, $autor, $ano, $qtde) {
        $this->dao->atualizarLivro($titulo, $titulo, $genero, $autor, $ano, $qtde);
    }

    public function buscar($titulo) {
        return $this->dao->buscarPorTitulo($titulo);
    }
}

?>