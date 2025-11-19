<?php
namespace Aula_17;


class Livros { //atributos
    private $titulo; 
    private $genero;
    private $autor;
    private $ano;
    private $qtde;

    public function __construct($titulo, $genero, $autor, $ano, $qtde) { //metodo construtor
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->autor = $autor;
        $this->ano = $ano;
        $this->qtde = $qtde;
    }
    public function getTitulo() //getters e setters
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    public function getAno()
    {
        return $this->ano;
    }
 
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }
 
    public function getQtde()
    {
        return $this->qtde;
    }

    public function setQtde($qtde)
    {
        $this->qtde = $qtde;

        return $this;
    }
}