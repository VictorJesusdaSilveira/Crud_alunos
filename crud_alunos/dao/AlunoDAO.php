<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Aluno.php");

class AlunoDAO{
    
    public function list(){
        $conexao = Connection::getConnection();

        $sql = "SELECT a.*, c.nome nome_curso, c.turno turno_curso
                FROM alunos a
                JOIN cursos c ON (c.id = a.id_curso)";
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchALL();
        return $this->map($dados);
    }

    public function insert(Aluno $aluno){
        $conexao = Connection::getConnection();

        $sql = "INSERT INTO alunos (nome, idade, estrangeiro, id_curso)
                VALUES (:nome,:idade,:estrangeiro,:id_curso)"; //:nome e os outros é só uma forma diferente de passar os parâmetros igual a interrogação (?)

        $stm = $conexao->prepare($sql);
        $stm->bindValue("nome", $aluno->getNome());
        $stm->bindValue("idade", $aluno->getIdade());
        $stm->bindValue("estrangeiro", $aluno->getEstrangeiro());
        $stm->bindValue("id_curso", $aluno->getCurso()->getId());
        $stm->execute();
    }

    private function map(array $dados){
        $alunos = array();

        foreach($dados as $d){
            $aluno = new Aluno();
            $aluno->setId($d['id']);
            $aluno->setNome($d['nome']);
            $aluno->setIdade($d['idade']);
            $aluno->setEstrangeiro($d['estrangeiro']);

            $curso = new Curso();
            $curso->setId($d['id_curso']);
            $curso->setNome($d['nome_curso']);
            $curso->setTurno($d['turno_curso']);

            $aluno->setCurso($curso);

            array_push($alunos, $aluno);

        }
            return $alunos;
    }

}


?>