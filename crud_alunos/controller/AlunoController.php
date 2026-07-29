<?php
require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../model/Aluno.php");
require_once(__DIR__ . "/../service/AlunoService.php");

class AlunoController{

    private AlunoDAO $alunoDAO;
    private AlunoService $alunoService;

    public function __construct(){
        $this->alunoDAO = new AlunoDAO();
        $this->alunoService = new AlunoService();
    }

    public function listar(){
        return $this->alunoDAO->list();
    }

    public function inserir(Aluno $aluno){
        //Validação
        $erros = $this->alunoService->validar($aluno);

        //Persistir
        if(empty($erros)){
            $this->alunoDAO->insert($aluno);
        }

        return $erros;

    }

}
?>