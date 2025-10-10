<?php 

class Turista{
    public $nome;

    public function __construct($nome) {
        $this -> nome = $nome;

    }

    public function Visitar($destino) {
        echo "O {$this->nome} esta visitando o {$Destino}";
        $destino ->atividade();
    }
}

class Destino{
    public $nome;
    public $comida;
    public $nadar;

    public function __construct($nome, $comida, $nadar) {
        $this -> nome = $nome;
        $this -> comida = $comida;
        $this -> nadar = $nadar;
    }
       
    public function atividade(){
         echo "Em {$this->nome}, o turista pode comer {$this->comida} e nadar em do {$this->nadar}.";
    }
}

$japao = new Destino("Japão", "sushi", "praias de Okinawa");
$brasil = new Destino("Brasil", "feijoada", "praia de Copacabana");
$acre = new Destino("Acre", "tacacá", "rio Acre");

// Um turista
$turista = new Turista("Brenda");

// Associação: o turista usa objetos da classe Destino
$turista->visitar($japao);
$turista->visitar($brasil);
$turista->visitar($acre);



?>