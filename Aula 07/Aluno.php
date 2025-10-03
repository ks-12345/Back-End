<?php

class Aluno {
    private $Nome;

    private $Nota;



    function __construct($Nome, $Nota){
 $this->Nome = $Nome;
$this->Nota = $Nota;
    }

    public function getNome() {
        return $this->Nome;
    }

     public function setNome() {
        return $this->Nome;
    }

   
public function getNota() {
    return $this->Nota < 10 ? "0" : $this->Nota;
}


    public function setNota() {
        return $this->Nota;
    }


}
    $Aluno1 = new Aluno("Samuel", "-1");
echo "O nome è " . $Aluno1->getNome() . ", ";
echo "minha nota è " . $Aluno1->getNota() . "";




?>

