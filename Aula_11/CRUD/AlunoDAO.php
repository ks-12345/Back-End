<?php

// CRUD -->Create, Read, Update e Delete

class AlunoDAO { // DAO --> Data Acess Object
    private $alunos = []; //Array para armazenamento temporario dos objetos e seus atributos, antes de mandar para o banco de dados. Foi criado inicialmente vazio [].
    
    public function criarAluno(Aluno $aluno){  // metodo Create  --> para criar um novo objeto;
         $this->alunos[$aluno->getId()] = $aluno;
    }
    public function lerAluno(): array{ // metodo read --> para ler informaçoes de um objeto ja criado;
        return  $this->alunos;
    }

    public function atualizarAluno($id, $novoAluno, $novoCurso){// metodo Update --> para atualizar informaçoes de um objeto ja existente;
        if (isset($this ->alunos [$id])) {
            $this -> alunos[$id]-> setNome($novoAluno);
            $this -> alunos[$id]-> setNome($novoCurso);
        }
    }

    public function excluirAluno($id){// metodo delet --> para excluir um obejeto;
        unset($this->alunos[$id]);
    }
}
?>













