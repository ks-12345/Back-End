<?php

class Carro{
    private $Marca;
    private $Modelo;
    private $Ano;
public function __construct($Marca, $Modelo, $Ano){

    $this->Marca = $Marca;
    $this->Modelo = $Modelo;
    $this->Ano = $Ano;
}

public function setMarca($Marca) {
        $this->Marca = ucwords(strtolower($Marca));
    }

public function getMarca() {
        return $this->Marca;
    }

public function setModelo($Modelo) {
        $this->Modelo = ucwords(strtolower($Modelo));
    }

public function getModelo() {
        return $this->Modelo;
    }

    public function setAno($Ano) {
        $this->Ano = $Ano;
    }

    public function getAno() {
        return $this->Ano;
    }
}

// Exemplo de uso:
$carro1 = new Carro("fiat", "uno", 2010);
echo "Marca: " . $carro1->getMarca() . "\n";
echo "Modelo: " . $carro1->getModelo() . "\n";
echo "Ano: " . $carro1->getAno() . "\n";

?>