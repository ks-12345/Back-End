<?php

class Aluno {
    private $id;
    private $nome;
    private $curso;
    
    public function __construct($id, $nome, $curso){
    $this->id = $id; //ALTERADO
    $this->nome = $nome; // ALTERADO
    $this->curso = $curso; // ALTERADO
    }

    public function setId($id) {
    $this->id = $id;
    }

    public function setNome($nome) {
    $this->nome = $nome;
    }

    public function setCurso($curso) {
    $this->curso = $curso;
    }
    
    public function getId() {
    return $this->id;
    }

    public function getNome() {
    return $this->nome;
    }

    public function getCurso() {
    return $this->curso;
    }
}