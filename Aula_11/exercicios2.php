<?php 

class Herois{
    public $nome;

    public function __construct($nome) {
        $this -> nome = $nome;

    }

    public function realizarMissa($local) {
        echo "{$this->nome} está indo para {$local->getNome()}.";
        $local->atividade();
    }

     public function getNome() {
        return $this->nome;
    }
}

class Local{
    public $nome;
    public $acao;

    public function __construct($nome, $acao) {
        $this -> nome = $nome;
        $this -> acao = $acao;
    }
       
    public function atividade(){
         echo "No {$this->nome}, o herói irá {$this->acao}.";
    }

    public function getNome() {
        return $this->nome;
    }
}


class Missao {
    private $herois = [];
    private $locais = [];

    // Adiciona um herói à missão
    public function adicionarHeroi(Heroi $heroi) {
        $this->herois[] = $heroi;
    }

    // Adiciona um local à missão
    public function adicionarLocal(Local $local) {
        $this->locais[] = $local;
    }

    // Executa todas as combinações de heróis e locais
    public function executar() {
        foreach ($this->herois as $heroi) {
            foreach ($this->locais as $local) {
                $heroi->realizarMissao($local);
            }
        }
    }
}

$cotil = new Local("Cotil", "fazer treinamentos especiais");
$shopping = new Local("Shopping", "doar brinquedos às crianças");

// Criando os heróis
$batman = new Heroi("Batman");
$superman = new Heroi("Superman");
$homemAranha = new Heroi("Homem-Aranha");

// Criando a missão e adicionando heróis e locais
$missao = new Missao();
$missao->adicionarHeroi($batman);
$missao->adicionarHeroi($superman);
$missao->adicionarHeroi($homemAranha);

$missao->adicionarLocal($cotil);
$missao->adicionarLocal($shopping);

// Executando a missão
$missao->executar();

?>