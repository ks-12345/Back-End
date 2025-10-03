<?php
$num1 = readline("Digite o primeiro número: ");
$num2 = readline("Digite o segundo número: ");
$operacao = readline("Digite a operação (+, -, *, /): ");

switch ($operacao) {
    case '+':
        echo "Resultado: " . ($num1 + $num2) . "\n";
        break;
    case '-':
        echo "Resultado: " . ($num1 - $num2) . "\n";
        break;
    case '*':
        echo "Resultado: " . ($num1 * $num2) . "\n";
        break;
    case '/':
        if ($num2 == 0) {
            echo "Erro: Divisão por zero!\n";
        } else {
            echo "Resultado: " . ($num1 / $num2) . "\n";
        }
        break;
    default:
        echo "Operação inválida!\n";
}
?>