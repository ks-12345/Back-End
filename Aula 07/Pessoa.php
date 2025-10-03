<?php

class Pessoa {
    private $Nome;

    private $Idade;

    private $Email;


    function __construct($Nome, $Idade, $Email){
 $this->Nome = $Nome;
$this->Idade = $Idade;
$this->Email = $Email;
    }

    public function getNome() {
        return $this->Nome;
    }

     public function setNome() {
        return $this->Nome;
    }

    public function getIdade() {
        return $this->Idade;
    }

     public function setIdade() {
        return $this->Idade;
    }

    public function getEmail() {
        return $this->Email;
    }

     public function setEmail() {
        return $this->Email;
    }


}
    $pessoa1 = new Pessoa("Samuel", "22", "samuel@exemplo.com");
echo "O nome è " . $pessoa1->getNome() . ", ";
echo "tem " . $pessoa1->getIdade() . " anos ";
echo "e o email é " . $pessoa1->getEmail() . "";



?>

