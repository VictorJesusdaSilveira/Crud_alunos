<?php

//Teste da Conexão
//require_once(__DIR__ . "/../../util/Connection.php");
//$conn = Connection::getConnection();
//print_r($conn);

require_once(__DIR__ . "/../../controller/AlunoController.php");

$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();

include(__DIR__ . "/../include/header.php");
?>

<h3>Listagem de Alunos</h3>
<a href="inserir.php">Inserir</a>

<table border=1>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>ID_curso</th>
        <th>Curso</th>
        <th>Turno</th>
    </tr>
    <?php foreach($alunos as $a) : ?>
        <tr>
            <td><?= $a->getId() ?></td>
            <td><?= $a->getNome() ?></td>
            <td><?= $a->getIdade() ?></td>
            <td><?= $a->getEstrangeiroDesc() ?></td>
            <td><?= $a->getCurso()->getId() ?></td>
            <td><?= $a->getCurso()->getNome() ?></td>
            <td><?= $a->getCurso()->getTurnoDesc() ?></td>
        </tr>
    <?php endforeach ?>
</table>



<?php

include(__DIR__ . "/../include/footer.php");
?>

