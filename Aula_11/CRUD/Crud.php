<?php

class aluno {
    private $id;
    private $nome;
    private $curso;

    public function __construct($id, $nome, $curso){
        $this -> id = ($id);
        $this -> nome = ($nome);
        $this -> curso = ($curso);
    }

public function setId($id){
    $this ->id=$id;
 }

public function setNome($nome){
    $this ->nome=$nome;
}

public function setCurso($curso){
    $this ->curso=$curso;
}

public function getId($id){
   return $this->id=$id;
 }

public function getNome($nome){
   return $this->nome=$nome;
}

public function getCurso($curso){
   return $this->curso=$curso;
}



}





?>