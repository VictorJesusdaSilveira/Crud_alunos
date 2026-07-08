<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Curso.php");

class CursoDAO {

    public function list(){
        $conexao = Connection::getConnection();

        $sql = "SELECT * FROM cursos";
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $dados = $stm->FetchAll();

        return $this->map($dados);
    }


    private function map(array $dados){
        $cursos = array();

        foreach($dados as $d){
            $curso = new Curso();
            $curso->setId($d['id']);
            $curso->setNome($d['nome']);
            $curso->setTurno($d['turno']);

            array_push($cursos, $curso);

        }
            return $cursos;
    }


}

?>