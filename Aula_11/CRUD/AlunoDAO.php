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

       $dados = json_decode ($conteudo,true); // Converte um JSON em array associativo

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
//metodo Auxiliar -> Salva o array de alunos no arquivo 
private function salvarEmArquivo() {
    $dados = [];

    foreach ($this->alunos as $id => $aluno) {
        $dados[$id] = [
            'id' => $aluno->getId(),
            'nome' => $aluno->getNome(),
            'curso' => $aluno->getCurso()
        ];
    }
      // Converte para JSON formatado e grava o arquivo
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }


    public function criarAluno(Aluno $aluno){  // metodo Create  --> para criar um novo objeto;
         $this->alunos[$aluno->getId()] = $aluno;
         $this->salvarEmArquivo(); // Chama o metodo auxiliar para salvar os dados no arquivo
    }
    public function lerAluno(): array{ // metodo read --> para ler informaçoes de um objeto ja criado;
        return  $this->alunos;
    }

    public function atualizarAluno($id, $novoAluno, $novoCurso){// metodo Update --> para atualizar informaçoes de um objeto ja existente;
        if (isset($this ->alunos [$id])) {
            $this -> alunos[$id]-> setNome($novoAluno);
            $this -> alunos[$id]-> setCurso($novoCurso);
        }
        $this->salvarEmArquivo();
    }

    public function excluirAluno($id){// metodo delet --> para excluir um obejeto;
        unset($this->alunos[$id]);
        $this->salvarEmArquivo();
    }
}
?>













