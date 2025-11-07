<?php

require_once "Bebidas.php";

class BebidaDAO {
    private $Bebidas = []; 
    private $arquivo = "Bebidas.json"; 


public function __construct() {
    if (file_exists($this->arquivo)) {
    
       $conteudo = file_get_contents
       ($this->arquivo); 

       $dados = json_decode ($conteudo,true); 

       if ($dados) {
        foreach ($dados as $nome => $info){
            $this ->Bebidas[$nome] = new Bebidas(
                 $info ['nome'],
                 $info ['categoria'],
                 $info ['volume'],
                 $info ['valor'],
                 $info ['qtde']

            );
        }
       }
    }
}

private function salvarEmArquivo() {
    $dados = [];

    foreach ($this->Bebidas as $nome => $bebida) {
        $dados[$nome] = [
            'nome' => $bebida->getNome(),
            'categoria' => $bebida->getCategoria(),
            'volume' => $bebida->getVolume(),
            'valor' => $bebida->getValor(),
            'qtde' => $bebida->getQtde()
        ];
    }

        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }


    public function criarBebida(Bebidas $bebida){  
         $this->Bebidas[$bebida->getNome()] = $bebida;
         $this->salvarEmArquivo(); 
    }

    public function lerBebida(): array{ 
        return  $this->Bebidas;
    }

    public function atualizarBebida($nome, $novoValor, $novoQtde){
        if (isset($this ->Bebidas [$nome])) {
            $this -> Bebidas[$nome]-> setValor($novoValor);
            $this -> Bebidas[$nome]-> setQtde($novoQtde);
        }
        $this->salvarEmArquivo();
    }

    public function excluirBebida($nome){
        unset($this->Bebidas[$nome]);
        $this->salvarEmArquivo();
    }
}
?>