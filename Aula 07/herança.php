<?php
class Imovel {
    private $categoria;
    private $N_comodos;
    private $valor;
    private $estado_conservacao;

    public function __construct($categoria, $N_comodos, $valor, $estado_conservacao){
        $this->categoria = $categoria;
        $this->N_comodos = $N_comodos;
        $this->valor = $valor;
        $this->estado_conservacao = $estado_conservacao;
    }
}

class Casa extends Imovel{ //extensão da classe Imovel
    private $tem_quintal; //atributo booleano - true ou false

    public function __construct($categoria, $N_comodos, $valor, $estado_conservacao, $tem_quintal){
        parent::__construct($categoria, $N_comodos, $valor, $estado_conservacao);
        $this->tem_quintal = $tem_quintal;
    }
}

class Apartamento extends Imovel{ //extensão da classe Imovel
    private $andar; //atributo inteiro

    public function __construct($categoria, $N_comodos, $valor, $estado_conservacao, $andar) {
        parent::__construct($categoria, $N_comodos, $valor, $estado_conservacao);
        $this->andar = $andar;
    }
}
// CRIAR UMA SUBCLASSE CHAMADA ESCOLA COM ATRIBUTO $SEGUIMENTO
class Escola extends Imovel{
    private $segmento;

    public function __construct($categoria, $N_comodos, $valor, $estado_conservacao, $segmento){
        parent::__construct($categoria, $N_comodos, $valor, $estado_conservacao);
        $this->segmento = $segmento;
    }

}
    // CRIAR UMA CLASSE FILHA CHAMADA COMERCIO COM ATRIBUTO $TAMANHO

class Comercio extends Imovel {

    private $tamanho;

    public function __construct($categoria, $N_comodos, $valor, $estado_conservacao, $tamanho){
        parent::__construct($categoria, $N_comodos, $valor, $estado_conservacao);
        $this->tamanho = $tamanho;
    }
}





?>



