<?php
require_once(__DIR__ . "/../../util/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-secondary px-3">
        <a class="navbar-brand" href="<?= BASE_URL ?>/index.php">Cadastro de Alunos</a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navSite">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navSite">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/index.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                        id="navDropDown" data-bs-toggle="dropdown">Cadastros</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= BASE_URL ?>/view/alunos/listar.php   ">Alunos</a>
                        <a class="dropdown-item" href="#">Turmas</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>