<?php

function exibirCarro($modelo, $marca, $ano, $revisao, $Ndonos) {
   
    $revisao_texto = $revisao ? "Sim" : "Não";

    echo "O carro " . $marca . " " . $modelo . ", ano " . $ano . ", já passou por revisão: " . $revisao_texto . ", número de donos: " . $Ndonos;
}


$escolha = readline("Digite o número do carro (carro1, carro2, carro3 ou carro4): ");


switch ($escolha) {
    case "carro1":
$modelo ="versa";
$marca = "nissan";
$ano = 2020;
$revisao = true;
$Ndonos = 2;
break;

case"carro2":
$modelo =" M5";
$marca = "BMW";
$ano = 2018;
$revisao = false;
$Ndonos = 2;
break;

case"carro3":
$modelo =" 911";
$marca = "porche";
$ano = 2026;
$revisao = false;
$Ndonos = 1;
break;

case"carro4":
$modelo= "Dolphin";
$marca = "BYD";
$ano = 2023;
$revisao = false;
$Ndonos = 1;
break;
}

exibirCarro($modelo, $marca, $ano, $revisao, $Ndonos);

?>