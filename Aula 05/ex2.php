<?php
$nome = readline(prompt: "Digite seu nome: ");
$sexo = readline(prompt: "Digite seu sexo (M/F): ");
class Usuario {

    public $nome;
    public $sexo;

    public function __construct($nome, $sexo) {
        $this->nome = $nome;
        $this->sexo = $sexo;
    }

    public function testandoReservista() {
        if ($this->sexo != "F") {
            echo "$this->nome, Apresente seu certificado de reservista do tiro de guerra.\n";
        } else {
            echo "Tudo certo, $this->nome.\n";
        }
    }
}


$usuario1 = new Usuario($nome, $sexo);
$usuario1->testandoReservista();

?>
