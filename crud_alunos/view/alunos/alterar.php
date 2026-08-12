<?php
require_once(__DIR__ . "/../../dao/AlunoDAO.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
$aluno = null;
$alunoCont = new AlunoController();

//Verificação da POST
if (isset($_POST["nome"])) {
    //Att os dados do aluno

    //Capturar os dados preenchidos
    $id = $_POST["id"];
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : null;
    $idade = is_numeric(($_POST["idade"])) ? (($_POST["idade"])) : null;
    $estrangeiro = trim($_POST["estrangeiro"]) ? trim($_POST["estrangeiro"]) : null;
    $idCurso = is_numeric($_POST["curso"]) ? ($_POST["curso"]) : null;

    //Criar objeto
    $aluno = new Aluno();
    $aluno->setId($id) -> setNome($nome) -> setIdade($idade) -> setEstrangeiro($estrangeiro);  
    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);

    //Validação e salvar no banco
    $erros = $alunoCont->alterar($aluno);
    print_r($erros);

    if(empty($erros)){
        header("location: listar.php");
    }else {   
        $msgErro = implode("<br>", $erros);
    }
} else {
    //Carregar os dados do aluno a ser alterado
    $id = 0;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    $aluno = $alunoCont->buscarPorId($id);

    if (! $aluno) {
        print "Id do aluno inválido!<br>";
        print "<a href='listar.php'>Voltar</a>";
        exit;
    }
}



require_once(__DIR__ . "/form.php");
