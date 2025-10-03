<?php

class Mercado {
    private $Produto;

    private $Valor;

    private $Unidades;



    function __construct($Produto, $Valor, $Unidades){
 $this->Produto = $Produto;
$this->Valor = $Valor;
$this->Unidades = $Unidades;
    }

    public function getProduto() {
        return $this->Produto;
    }

     public function setProduto() {
        return $this->Produto;
    }

   
public function getValor() {
    return $this->Valor < 10 ? "0" : $this->Valor;
}


    public function setValor() {
        return $this->Valor;
    }

    public function getUnidades() {
    return $this->Unidades;
}

    public function setUnidades($Unidades){
        $this->Unidades = $Unidades;
    }

}
    $Mercado1 = new Mercado("Samuel", "12,00", "10");
echo "O Produto è " . $Mercado1->getProduto() . ", ";
echo "e custa R$ " . $Mercado1->getValor() . " ";
echo "e tem R$ " . $Mercado1->getUnidades() . " unidades";




?>

