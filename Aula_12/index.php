<?php 

//* Modifique o Desinfetante Urca para Desinfetante Barbarex; E ao menos 2 valores dos preços que voce determinou 

//Apague a maça e o tomate dos produtos (aqui nao somos saudaveis)/

namespace Aula_12;

require_once "ProdutoDAO.php";
require_once "Produtos.php";

$dao = new ProdutoDAO();

// CREATE
$dao-> criarProduto(new Produtos (101, "Tomate", 4.50));
$dao-> criarProduto(new Produtos (102, "Maça", 3.20));
$dao-> criarProduto(new Produtos (103, "Queijo Brie", 25.00));
$dao-> criarProduto(new Produtos (104, "Iogurte Grego", 6.80));
$dao-> criarProduto(new Produtos (105, "Guaraná Jeu", 7.50));
$dao-> criarProduto(new Produtos (106, "Bolacha Bono", 4.00));
$dao-> criarProduto(new Produtos (107, "Desinfetante Urca", 8.90));
$dao-> criarProduto(new Produtos (108, "Prestobarba Bic", 12.30));

echo "Listagem Inicial:";
foreach ($dao->lerProduto() as $produto) {
    echo "{$produto->getCodigo()} - {$produto->getNome()} -
    {$produto->getPreco()} \n";
}

$dao->atualizarProduto(105, "Desinfetante Barberex", "9.50");

echo "\n Após Atualização: \n ";
foreach ($dao->lerProduto() as $produto) {
    echo "{$produto->getCodigo()} - {$produto->getNome()} -
    {$produto->getPreco()} \n";
}


// DELETE
$dao->excluirProduto(101);
$dao->excluirProduto(102);

echo "\nApós exclusão:\n";
foreach ($dao->lerProduto() as $produto) {
    echo "{$produto->getCodigo()} -  {$produto->getNome()} -  {$produto->getPreco()} \n";
}
?>