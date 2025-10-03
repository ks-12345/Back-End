<?php

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Retangulo implements Forma {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * $this->raio * $this->raio;
    }
}

// Teste interativo
echo "Escolha a forma (Quadrado, Retangulo, Circulo): ";
$forma = trim(fgets(STDIN));

if ($forma == "Quadrado") {
    echo "Informe o valor do lado: ";
    $lado = trim(fgets(STDIN));
    $quadrado = new Quadrado($lado);
    echo "Área do quadrado: " . $quadrado->calcularArea() . PHP_EOL;
} elseif ($forma == "Retangulo") {
    echo "Informe a base: ";
    $base = trim(fgets(STDIN));
    echo "Informe a altura: ";
    $altura = trim(fgets(STDIN));
    $retangulo = new Retangulo($base, $altura);
    echo "Área do retângulo: " . $retangulo->calcularArea() . PHP_EOL;
} elseif ($forma == "Circulo") {
    echo "Informe o valor do raio: ";
    $raio = trim(fgets(STDIN));
    $circulo = new Circulo($raio);
    echo "Área do círculo: " . $circulo->calcularArea() . PHP_EOL;
} else {
    echo "Forma inválida!" . PHP_EOL;
}
?>