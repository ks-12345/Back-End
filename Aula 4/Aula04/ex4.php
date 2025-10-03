<?php

$modelo_carro = "Versa";
$marca_carro = "Nissan";
$ano_carro = 2020;
$ndonos_carro = 2;

$modelo_carro2 = "M5";
$marca_carro2 = "BMW";
$ano_carro2 = 2018;
$ndonos_carro2 = 2;

$modelo_carro3 = "911";
$marca_carro3 = "Porsche";
$ano_carro3 = 2026;
$ndonos_carro3 = 1;

$modelo_carro4 = "Dolphin";
$marca_carro4 = "BYD";
$ano_carro4 = 2023;
$ndonos_carro4 = 1;

function calcularValor($marca, $ano, $Ndonos) {

    switch (strtolower($marca)) {
        case 'bmw':
        case 'porsche':
            $precoBase = 300000;
            break;
        case 'nissan':
            $precoBase = 70000;
            break;
        case 'byd':
            $precoBase = 150000;
            break;
        default:
            $precoBase = 0;
    }

    $anoAtual = date("Y");
    $anosDeUso = $anoAtual - $ano;
    $descontoAnos = $anosDeUso * 3000;

    $descontoDonos = 0;
    if ($Ndonos > 1) {
        $donosAdicionais = $Ndonos - 1;
        $descontoDonos = ($precoBase * 0.05) * $donosAdicionais;
    }

    $valorFinal = $precoBase - $descontoAnos - $descontoDonos;

    if ($valorFinal < 0) {
        $valorFinal = 0;
    }

    return $valorFinal;
}

echo "{$marca_carro} {$modelo_carro}: R$ " . number_format(calcularValor($marca_carro, $ano_carro, $ndonos_carro), 2, ',', '.') . "\n";
echo "{$marca_carro2} {$modelo_carro2}: R$ " . number_format(calcularValor($marca_carro2, $ano_carro2, $ndonos_carro2), 2, ',', '.') . "\n";
echo "{$marca_carro3} {$modelo_carro3}: R$ " . number_format(calcularValor($marca_carro3, $ano_carro3, $ndonos_carro3), 2, ',', '.') . "\n";
echo "{$marca_carro4} {$modelo_carro4}: R$ " . number_format(calcularValor($marca_carro4, $ano_carro4, $ndonos_carro4), 2, ',', '.') . "\n";

?>