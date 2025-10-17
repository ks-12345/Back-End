<?php 

require_once "CRUD.php";
require_once "AlunoDAO.php";

// Objeto da classe AlunoDAO para gerenciar os métodos do CRUD 

$dao = new AlunoDAO();

// CREATE 
$dao-> criarAluno(new Aluno (1, "Maria", "Design"));
$dao-> criarAluno(new Aluno (2, "Gabriel", "Moda"));
$dao-> criarAluno(new Aluno (3, "Eduardo", "Manicure"));

$dao-> criarAluno(new Aluno (4, "aurora", "arquitetura"));
$dao -> criarAluno(new Aluno (5, "Oliver", "director"));
$dao -> criarAluno(new Aluno (6, "amanda", "lutadora"));
$dao -> criarAluno(new Aluno (7, "geysa", "engenharia"));
$dao -> criarAluno(new Aluno (8, "joab", "professor"));
$dao -> criarAluno(new Aluno (9, "bernardo", "streamer"));

// Crie mais objetos obdecendo a seguinte lista:
// id - nome - curso
// 4 - aurora - arquitetura
// 5 - Oliver - director
// 6 - amanda - lutadora
// 7 - geysa - engenhaira
// 8 - joab - professor
// 9 - bernardo - streamer


echo "Listagem Inicial:";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} -
    {$aluno->getCurso()} \n";
}


$dao->atualizarAluno(3, "Viviane", "Eletricista");

$dao->atualizarAluno(7, "clotilde", "engenharia");
$dao->atualizarAluno(8, "joana", "professor");
$dao->atualizarAluno(9, "bernardo", "Dev");
$dao->atualizarAluno(6, "amanda", "logistica");
$dao->atualizarAluno(5, "Oliver", "eletrica");
// faça as seguintes atualizações:
//- alterar nome geysa para clotilde
//- alterar nome joab para joana
//- alterar curso bernardo para Dev
//- alterar curso amanda para logistica
//- alterar curso oliver para eletrica

echo "\n Após Atualização: \n ";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} -
    {$aluno->getCurso()} \n";
}


// DELETE
$dao->excluirAluno(2);

echo "\nApós exclusão:\n";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} -  {$aluno->getNome()} -  {$aluno->getCurso()} \n";
}
?>