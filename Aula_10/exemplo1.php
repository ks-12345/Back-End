<?php
//     Polimorfismo


//  O termo Polimorfimo significa "varias formas".
//  Associando isso a Programaçao Orientada a Objetos, o 
//  conceito se trata de varias classes e suas instancias (objetos) respondendo a uma mesmo metodo de formas diferentes. 
//  No exemplo do Interface da Aula_09, termos um metodo calcularArea() que responde de froma diferentes a classe Quadrado , a classe Pentagono
//  a  classe Circulo . Isso quer dizer que a funçao é a mesma - calcular a area da forma geometrica - mas a operaçao musa de acordo com a figura.

// Crie um metodo chamado "mover()", onde ele responde a varias formas diferente, para as sub-classes: Carro, Aviao, Barco e Elevador. Dica: Utilize Interfaces.
//  Interface Veiculo





// Interface Veiculo
interface Veiculo {
    public function Mover();
}

// Subclasse Carro
class Carro implements Veiculo {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function Mover() {
        echo "O carro {$this->nome} está se movendo pela estrada.\n";
    }
}

// Subclasse Avião
class Aviao implements Veiculo {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function Mover() {
        echo "O avião {$this->nome} está voando pelos céus.\n";
    }
}

// Subclasse Barco
class Barco implements Veiculo {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function Mover() {
        echo "O barco {$this->nome} está navegando pelo mar.\n";
    }
}

// Subclasse Elevador
class Elevador implements Veiculo {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function Mover() {
        echo "O elevador {$this->nome} está subindo ou descendo dentro do prédio.\n";
    }
}

// ===== Criando objetos de teste =====
$carro = new Carro("Fusca");
$aviao = new Aviao("Boing 747");
$barco = new Barco("Titanic");
$elevador = new Elevador("Schindler");

// Testando individualmente
echo "=== Testando objetos individualmente ===\n";
$carro->Mover();
$aviao->Mover();
$barco->Mover();
$elevador->Mover();
?>