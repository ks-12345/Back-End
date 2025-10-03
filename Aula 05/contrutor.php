<?php

class Produto{
public $nome;
public $categoria;
public $fornecedor;

public $qtde_estoque;

public function __construct($nome, $categoria, $fornecedor, $q) {

}

public function produto_vendido(){

 }
}

// $bolacha = new Produtos("Nikito", "Doces", "Vitarella", 220);
$bolacha1 = new Produto();
$bolacha1->nome = "Nikito";
$bolacha1->categoria = "Doces";
$bolacha1->fornecedor = "Vitarella";
$bolacha1->qtde_estoque = 220;

// $feijao = new Produtos("Oliron", "Mantimentos", "Reserva Nobre", 123);

$feijao1 = new Produto();
$feijao1->nome = "Oliron";
$feijao1->categoria = "Mantimentos";
$feijao1->fornecedor = "Reserva Nobre";
$feijao1->qtde_estoque = 123;


?>