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
        <input type="text" id="txtNome" placeholder="Informe o nome" name="nome" value="<?= $aluno != null ? $aluno->getNome() : ''?>">
    </div>

    <div>
        <label for="txtIdade">Idade: </label>
        <input type="number" id="txtIdade" placeholder="Informe a idade" name="idade" value="<?= $aluno != null ? $aluno->getIdade() : '' ?>">
    </div>

    <div>
        <label for="selEstrangeiro">Estrangeiro: </label>
        <select name="estrangeiro" id="selEstrangeiro">
            <option value="">----Selecione----</option>
            <option value="S" <?= $aluno != null && $aluno->getEstrangeiro() == "S" ? 'selected' : '' ?>>Sim</option>
            <option value="N" <?= $aluno != null && $aluno->getEstrangeiro() == "N" ? 'selected' : '' ?>>Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso: </label>
        <select name="curso" id="selCurso">
            <option value="">----Selecione----</option>

            <!--Cursos criados de forma dinâmica-->
            <?php foreach($cursos as $c) : ?>
                <option value="<?= $c->getId()?>"
                    <?php
                        if($aluno && $aluno->getCurso()->getId() == $c->getId()){
                            print "selected";
                        }
                    ?>
                
                ><?= $c ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <input type="hidden" name="id" value="<?= $aluno ? $aluno->getId() : 0 ?>">
    </div>

    <div>
        <button type="submit">Salvar</button>
    </div>
</form>

<div style="color: red;">
    <?= $msgErro ?>
</div>

<a href="listar.php">Voltar</a>

<?php
include(__DIR__ .  "/../include/footer.php");
?>