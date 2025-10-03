<?php

class Moto {
    public $Marca;
    public $Modelo;
    public $Ano;
    public $Revisao;
}

// Criando objetos sem construtor
$moto1 = new Moto();
$moto1->Marca = "Honda";
$moto1->Modelo = "CB 300R";
$moto1->Ano = 2023;
$moto1->Revisao = true;

$moto2 = new Moto();
$moto2->Marca = "Yamaha";
$moto2->Modelo = "Lander 250";
$moto2->Ano = 2022;
$moto2->Revisao = false;

$moto3 = new Moto();
$moto3->Marca = "Kawasaki";
$moto3->Modelo = "Ninja ZX-6R";
$moto3->Ano = 2024;
$moto3->Revisao = true;


    ?>