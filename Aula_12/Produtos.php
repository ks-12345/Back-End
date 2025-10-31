<?php

// Crie uma classe 'produtos' com os atributos: códigos, nome e preco. Após isso faça a ProdutosDAO para a utilização dos métodos CRUD.
// Por último faça um index.php para testar a criação e manipulação dos objetos.
// Implemente a persistencia de dados com o arquivo 'produtos.json'.

namespace Aula_12;

class Produtos {
    private $codigo;
    private $nome;
    private $preco;

    public function __construct($codigo, $nome, $preco) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }
}
?>