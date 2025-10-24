<?php

class AlunoDAO {
    private $alunos = []; // Array para armazenamento temporário dos objetos e seus atributos, antes de mandar para o banco de dados. foi criado inicialmente vazio [];

private $arquivo = "alunos.json"; // Cria o arquivo de json para que os dados sejam armazenados 

// Construtor AlunoDAO --> carrega os dados do arquivo ao iniciar a aplicação
public function __construct() {
    if (file_exists($this->arquivo)) {
       // Lê o conteudo do arquivo caso ele ja exista
       $conteudo = file_get_contents
       ($this->arquivo); // Atribui as informações do arquivo existente a variavel $conteudo

       $dados = json_decode (json: $conteudo, associative: true); // Converte um JSON em array associativo

       if ($dados) {
        foreach ($dados as $id => $info){
            $this ->alunos[$id] = new Aluno(
                id: $info ['id'],
                nome: $info ['nome'],
                curso: $info ['curso']
            );
        }
       }
    }
}



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













