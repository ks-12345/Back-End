<?php
// Exercício Extra - Identificar tipagem

$a = readline(prompt: "Digite a primera variável: ");
$b = readline(prompt: "Digite a segunda variável: ");

if ($a === $b) {
    echo "Variaveis iguais! Primeiro valor " . gettype($a) . " e segundo valor " . gettype($b) . ".\n";
} else {
    echo "ERRO! Variáveis de tipos diferentes. Primeiro valor " . gettype($a) . " e segundo valor " . gettype($b) . ".\n";
}
?>
