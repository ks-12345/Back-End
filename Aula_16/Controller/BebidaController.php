<?php

namespace Aula_16;
use Aula_16\Model\BebidaDAO;

require_once __DIR__. "\..\Model\BebidaDAO.php";
require_once __DIR__. "\..\Model\Bebida.php";

class BebidaController {
    private $dao;

    //contrutor: cria o objeto DAO (responsavel por salvar/carregar)

    public function __construct() {
        $this->dao = new BebidaDAO();
    }

    //lista todas as bebidas 

    public function ler() {
        return $this->dao->lerBebidas();

    }

    //cadastra nova bebida

    public function criar($nome,$categoria,$volume,$valor,$qtde) {
        $id = time();
        $bebida = new Bebida( $nome, $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebida($bebida);

    }

    // atualiza bebida existente

    public function atualizar($nome, $valor, $qtde) {
        $this->dao->atualizarBebidas($nome, $valor, $qtde);
    }

    public function deletar($nome) {
            $this->dao->excluirBebida($nome);
        
        }
    
    public function editar($nome, $categoria, $volume, $valor, $qtde) {
        $this->dao->editarBebida($nome, $categoria, $volume, $valor, $qtde);    
    }
    public function buscar($nome) {
        return $this->dao->buscarBebidaPorNome($nome);
    }
}

?>