<?php

// Criar uma classe simples
class Carro { //criando classe (molde para criação de objetos)

    public $Marca; //criando atributo marca
    public $Modelo; //criando atributo modelo
    public $Ano; //criando atributo ano de fabric.
    public $Revisao; //criando atributo  "precisa de revisão?"
    public $N_donos; //criando atributo número de donos
    public $Cor; //criando atributo cor
    public $Placa; //criando atributo placa

    public function __construct($Marca, $Modelo, $Ano, $Revisao, $N_donos, $Cor, $Placa) {
        $this->Marca = $Marca;
        $this->Modelo = $Modelo;
        $this->Ano = $Ano;
        $this->Revisao = $Revisao;
        $this->N_donos = $N_donos;
        $this->Cor = $Cor;
        $this->Placa = $Placa;
    }
}

$carro1 = new Carro("Porsche", "911", 2020, false, 1);
$carro2 = new Carro("Mitsubishi", "Lancer", 1945, true, 1);


class Condutor {//criando classe (molde para criação de objetos)

    public $Nome; 
    public $Idade; 
    public $Cidade; 
    public $EstadoCivil; 
  

    public function __construct($Nome, $Idade, $Cidade, $EstadoCivil) {
        $this->Nome = $Nome;
        $this->Idade = $Idade;
        $this->Cidade = $Cidade;
        $this->EstadoCivil = $EstadoCivil;
 
}
}

$condutor1 = new Condutor("Maria", "88", "Limeira", "Viuva");
$condutor1 = new Condutor("Aleandro", "20", "Limeira", "Solteiro");
$condutor1 = new Condutor("Jose", "47", "Bahia", "Casado");

?>