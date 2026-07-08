<?php

require_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursoCont);

include(__DIR__ . "/../include/header.php");



?>

<h3>Inserir Aluno</h3>

<form action="" method="POST">
    <div>
        <label for="txtNome">Nome: </label>
        <input type="text" id="txtNome" placeholder="Informe o nome" name="nome">
    </div>

    <div>
        <label for="txtIdade">Idade: </label>
        <input type="number" id="txtIdade" placeholder="Informe a idade" name="idade">
    </div>

    <div>
        <label for="selEstrangeiro">Estrangeiro: </label>
        <select name="estrangeiro" id="selEstrangeiro">
            <option value="">----Selecione----</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso: </label>
        <select name="curso" id="selCurso">
            <option value="">----Selecione----</option>

            <!--Cursos criados de forma dinâmica-->
            <?php foreach($cursos as $c) : ?>
                <option value="<?= $c->getId()?>"><?= $c ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Salvar</button>
    </div>
</form>

<a href="listar.php">Voltar</a>



<?php
include(__DIR__ .  "/../include/footer.php");
?>