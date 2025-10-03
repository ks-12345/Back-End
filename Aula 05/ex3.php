<?php
$nome = readline(prompt: "Digite seu nome: ");
$estadocivil = readline(prompt: "Voce è Casado(o) (S/N): ");
class Usuario {

    public $nome;
    public $estadocivil;

    public function __construct($nome, $estadocivil) {
        $this->nome = $nome;
        $this->estadocivil = $estadocivil;
    }

    public function Casado() {
        if ($this->estadocivil != "N") {
   $Anos_Casado = readline(prompt: "Quanto Anos: ");
            echo "$this->nome, Parabens pelos $Anos_Casado\n";
        } else {
            echo "Oloco";
        }
    }
}


$usuario1 = new Usuario($nome, $estadocivil);
$usuario1->Casado();

?>
