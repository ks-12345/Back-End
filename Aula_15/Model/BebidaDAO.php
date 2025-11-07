<?php 
 namespace Aula_15;
class BebidaDAO {
    private $bebidasArray = [];

    private $arquivoJson = 'bebidas.json';

    public function __construct() {
        if (file_exists($this->arquivoJson)) {
            $conteudoArquivo = file_get_contents($this->arquivoJson);

            $dadosArquivosEmArray = json_decode($conteudoArquivo, true);

            if ($dadosArquivosEmArray) {
                foreach ($dadosArquivosEmArray as $nome => $info) {
                    $this->bebidasArray[$nome] = new Bebida(
                        $info['nome'],
                        $info['categoria'],
                        $info['volume'],
                        $info['valor'],
                        $info['qtde']
                    );
                }
            }
        }
    }

 private function salvarArquivo(){
    $dadosParaSalvar = [];

    foreach ($this->bebidasArray AS $nome => $bebida) {
        $dadosParaSalvar[$nome] = [
            'nome' => $bebida->getNome(),
            'categoria' => $bebida->getCategoria(),
            'volume' => $bebida->getVolume(),
            'valor' => $bebida->getValor(),
            'qtde' => $bebida->getQtde()
        ];
    }   
    file_put_contents($this->arquivoJson, json_encode($dadosParaSalvar, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  }
  // create
  public function criarBebidas(Bebida $bebida){
    $this->bebidasArray[$bebida->getNome()] = $bebida;
    $this->salvarArquivo();
  }

   // read 
    public function lerBebidas(){
        return $this->bebidasArray;
    }

  //update 
    public function atualizarBebidas($nome, $novovalor, $novaqtde){
        if (isset($this->bebidasArray[$nome])) {
            $this->bebidasArray[$nome];
            $this->bebidasArray[$nome]->setValor($novovalor);
            $this->bebidasArray[$nome]->setQtde($novaqtde);
    
        }
        $this->salvarArquivo();
    }

   // delete
    public function excluirBebida($nome){
        unset($this->bebidasArray[$nome]);
        $this->salvarArquivo();
    }
    // editar bebida
    public function editarBebida($nome, $categoria, $volume, $valor, $qtde){
        if (isset($this->bebidasArray[$nome])) {
            $this->bebidasArray[$nome];
            $this->bebidasArray[$nome]->setCategoria($categoria);
            $this->bebidasArray[$nome]->setVolume($volume);
            $this->bebidasArray[$nome]->setValor($valor);
            $this->bebidasArray[$nome]->setQtde($qtde);
    
        }
        $this->salvarArquivo();
    }
    public function buscarBebidaPorNome($nome){
        // Retorna o objeto Bebida no índice com o nome fornecido, ou null se não existir
        return $this->bebidasArray[$nome] ?? null;
}
}
?>