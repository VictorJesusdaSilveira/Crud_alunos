<?php
require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../model/Curso.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = null;

//Verificação se o form foi enviado
if(isset($_POST["nome"])){
    //Capturar dados
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : null;
    $idade = is_numeric(($_POST["idade"])) ? (($_POST["idade"])) : null;
    $estrangeiro = trim($_POST["estrangeiro"]) ? trim($_POST["estrangeiro"]) : null;
    $idCurso = is_numeric($_POST["curso"]) ? ($_POST["curso"]) : null;

    //Criar objeto
    $aluno = new Aluno();
    $aluno->setNome($nome) -> setIdade($idade) -> setEstrangeiro($estrangeiro);  
    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);

    //Validação e Persistir
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    if(empty($erros)){
        header("location: listar.php");
    }else {   
        $msgErro = implode("<br>", $erros);
    }

}

require_once(__DIR__ . "/form.php");


?>

