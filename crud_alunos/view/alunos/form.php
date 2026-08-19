<?php

require_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();

include(__DIR__ . "/../include/header.php");
include(__DIR__ . "/../include/menu.php");
?>

<h3><?= $aluno && $aluno->getId() > 0 ? "Alterar" : "Inserir" ?> aluno</h3>

<div class="row">
    <div class="col-6">
        <form action="" method="POST">
            <div>
                <label class="form-label" for="txtNome">Nome: </label>
                <input class="form-control" type="text" id="txtNome" placeholder="Informe o nome" name="nome" value="<?= $aluno != null ? $aluno->getNome() : '' ?>">
            </div>

            <div>
                <label class="form-label" for="txtIdade">Idade: </label>
                <input class="form-control" type="number" id="txtIdade" placeholder="Informe a idade" name="idade" value="<?= $aluno != null ? $aluno->getIdade() : '' ?>">
            </div>

            <div>
                <label for="selEstrangeiro">Estrangeiro: </label>
                <select class="form-select" name="estrangeiro" id="selEstrangeiro">
                    <option value="">----Selecione----</option>
                    <option value="S" <?= $aluno != null && $aluno->getEstrangeiro() == "S" ? 'selected' : '' ?>>Sim</option>
                    <option value="N" <?= $aluno != null && $aluno->getEstrangeiro() == "N" ? 'selected' : '' ?>>Não</option>
                </select>
            </div>

            <div>
                <label for="selCurso">Curso: </label>
                <select class="form-select" name="curso" id="selCurso">
                    <option value="">----Selecione----</option>

                    <!--Cursos criados de forma dinâmica-->
                    <?php foreach ($cursos as $c) : ?>
                        <option value="<?= $c->getId() ?>"
                            <?php
                            if ($aluno && $aluno->getCurso()->getId() == $c->getId()) {
                                print "selected";
                            }
                            ?>><?= $c ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <input type="hidden" name="id" value="<?= $aluno ? $aluno->getId() : 0 ?>">
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">Salvar</button>
            </div>
        </form>
    </div>
    <?php if ($msgErro): ?>
        <div class="alert alert-danger  col-6">
            <?= $msgErro ?>
        </div>
    <?php endif; ?>

</div>

<a class="btn btn-outline-info mt-3" href="listar.php">Voltar</a>

<?php
include(__DIR__ .  "/../include/footer.php");
?>