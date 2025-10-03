<?php

$modelo_carro1 ="versa";
$marcada_carro1 = "nissan";
$ano_carro1 = 2020;
$revisao_carro1 = true;
$Ndonos_carro1 = 2;

$modelo_carro2 =" M5";
$marcada_carro2 = "BMW";
$ano_carro2 = 2018;
$revisao_carro2 = false;
$Ndonos_carro2 = 2;

$modelo_carro3 =" 911";
$marcada_carro3 = "porche";
$ano_carro3 = 2026;
$revisao_carro3 = false;
$Ndonos_carro3 = 1;

$modelo_carro4= "Dolphin";
$marcada_carro4 = "BYD";
$ano_carro4 = 2023;
$revisao_carro4 = false;
$Ndonos_carro4 = 1;


function passouRevisao ($revisaoF): bool {
    $revisaoF=false;
    return $revisaoF;

} 

$revisao_carro1 = passouRevisao ($revisao_carro1);

?>