<?php
require("cabecalho.php");
require("conexao.php");

if(isset($_POST['cidade_origem'])){

    $cidade_origem = $_POST['cidade_origem'];
    $cidade_destino = $_POST['cidade_destino'];
    $horario_saida = $_POST['horario_saida'];
    $horario_chegada = $_POST['horario_chegada'];

    $sql = "
        INSERT INTO linhas
        (
            cidade_origem,
            cidade_destino,
            horario_saida,
            horario_chegada
        )
        VALUES
        (
            '$cidade_origem',
            '$cidade_destino',
            '$horario_saida',
            '$horario_chegada'
        )
    ";

    $pdo->query($sql);
}
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Cadastro de Linhas</h1>

        <a href="principal.php"
           class="btn btn-outline-secondary">
            ← Voltar
        </a>

    </div>

<form method="post">

    <div class="mb-3">
        <label class="form-label">
            Cidade de Origem
        </label>

        <input
            type="text"
            name="cidade_origem"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Cidade de Destino
        </label>

        <input
            type="text"
            name="cidade_destino"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Horário de Saída
        </label>

        <input
            type="time"
            name="horario_saida"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Horário de Chegada
        </label>

        <input
            type="time"
            name="horario_chegada"
            class="form-control"
            required>
    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Cadastrar Linha

    </button>

</form>

<?php

$result = $pdo->query("SELECT * FROM linhas");
$linhas = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table table-striped table-hover mt-4">

    <thead>

        <tr>

            <th>ID</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Saída</th>
            <th>Chegada</th>
            <th>Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($linhas as $linha): ?>

        <tr>

            <td><?= $linha['id'] ?></td>

            <td><?= $linha['cidade_origem'] ?></td>

            <td><?= $linha['cidade_destino'] ?></td>

            <td><?= $linha['horario_saida'] ?></td>

            <td><?= $linha['horario_chegada'] ?></td>

            <td>

                <button
                    type="button"
                    class="btn btn-warning"
                    onclick="window.location.href='editarLinha.php?id=<?= $linha['id'] ?>'">

                    Editar

                </button>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<?php
require("rodape.php");
?>