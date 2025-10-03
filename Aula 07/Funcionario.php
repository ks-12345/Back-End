<?php

class Funcionario {
    private $nome;
    private $salario;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }
}

// Definindo os valores iniciais
$funcionario1 = new Funcionario();
$funcionario1->setNome("Samuel");
$funcionario1->setSalario(1200.00);

echo "Nome: " . $funcionario1->getNome() . "\n";
echo "Salário: R$ " . $funcionario1->getSalario() . "\n";

// Alterando os valores
$funcionario1->setNome("Brenda");
$funcionario1->setSalario(2500.00);

echo "Nome alterado: " . $funcionario1->getNome() . "\n";
echo "Salário alterado: R$ " . $funcionario1->getSalario() . "\n";


?>

