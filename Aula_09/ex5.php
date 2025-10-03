<?php

class Calculadora {
    public function somar(...$numeros) {
        $quantidade = count($numeros);
        if ($quantidade === 2 || $quantidade === 3) {
            return array_sum($numeros);
        } else {
            return "Número de argumentos inválido. Use 2 ou 3.";
        }
    }
}

// Teste interativo
echo "Quantos números você quer somar (2 ou 3): ";
$quantidade = trim(fgets(STDIN));

if ($quantidade == 2) {
    echo "Informe o primeiro número: ";
    $num1 = trim(fgets(STDIN));
    echo "Informe o segundo número: ";
    $num2 = trim(fgets(STDIN));
    $calc = new Calculadora();
    echo "Resultado: " . $calc->somar($num1, $num2) . PHP_EOL;
} elseif ($quantidade == 3) {
    echo "Informe o primeiro número: ";
    $num1 = trim(fgets(STDIN));
    echo "Informe o segundo número: ";
    $num2 = trim(fgets(STDIN));
    echo "Informe o terceiro número: ";
    $num3 = trim(fgets(STDIN));
    $calc = new Calculadora();
    echo "Resultado: " . $calc->somar($num1, $num2, $num3) . PHP_EOL;
} else {
    echo "Número de argumentos inválido!" . PHP_EOL;
}
?>