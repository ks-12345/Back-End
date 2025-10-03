<?php
class Cadastro {
    public $dia;
    public $mes;
    public $ano;

    public $nome;
    public $idade;
    public $cpf;
    public $telefone;
    public $endereco;
    public $estado_civil;
    public $sexo;

    public $marca;
    public $categoria;
    public $data_fabricacao;
    public $data_venda;

    // Construtor único que simula 3 sobrecargas
    public function __construct(...$args) {
        $num = count($args);

        if ($num == 3) {
            // 1° Construtor: $dia, $mes, $ano
            $this->dia = $args[0];
            $this->mes = $args[1];
            $this->ano = $args[2];

        } elseif ($num == 7) {
            // 2° Construtor: $nome, $idade, $cpf, $telefone, $endereco, $estado_civil, $sexo
            $this->nome = $args[0];
            $this->idade = $args[1];
            $this->cpf = $args[2];
            $this->telefone = $args[3];
            $this->endereco = $args[4];
            $this->estado_civil = $args[5];
            $this->sexo = $args[6];

        } elseif ($num == 5) {
            // 3° Construtor: $marca, $nome, $categoria, $data_fabricacao, $data_venda
            $this->marca = $args[0];
            $this->nome = $args[1];
            $this->categoria = $args[2];
            $this->data_fabricacao = $args[3];
            $this->data_venda = $args[4];
        }
    }
}

// Testando os construtores:

// Usando o 1° construtor (3 parâmetros)
$obj1 = new Cadastro(12, "Agosto", 2025);

// Usando o 2° construtor (7 parâmetros)
$obj2 = new Cadastro("Carlos Silva", 30, "123.456.789-00", "11 98888-7777", "Rua A, 123", "Solteiro", "Masculino");

// Usando o 3° construtor (5 parâmetros)
$obj3 = new Cadastro("Honda", "CB 500F", "Street", "2023-01-10", "2024-07-20");

echo "<pre>";
print_r($obj1);
print_r($obj2);
print_r($obj3);
echo "</pre>";

?>