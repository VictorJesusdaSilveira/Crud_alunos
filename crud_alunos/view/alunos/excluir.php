<?php
require_once(__DIR__ . "/../../controller/AlunoController.php");

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $alunoCont = new AlunoController();
    $erros = $alunoCont->excluir($id);

    if (empty($erros)) {
        header("Location: listar.php");
        exit;
    } else {
        echo implode("<br>", $erros);
        echo "<br><a href='listar.php'>Voltar</a>";
    }

} else {
    echo "Id do aluno não informado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
}