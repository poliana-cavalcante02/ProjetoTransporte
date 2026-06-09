<?php
    require("cabecalho.php");
    require("conexao.php");

    if (isset($_POST['nome'])) {

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        $sql = "
            INSERT INTO passageiros
            (
                nome,
                cpf,
                telefone
            )
            VALUES
            (
                '$nome',
                '$cpf',
                '$telefone'
            )
        ";

        $pdo->query($sql);
    }

?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Cadastro de Passageiros</h1>

        <a href="principal.php"
           class="btn btn-outline-secondary">

            ← Voltar

        </a>

    </div>

<form method="post">

    <div class="mb-3">

        <label class="form-label">
            Nome do Passageiro
        </label>

        <input
            type="text"
            name="nome"
            class="form-control"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            CPF
        </label>

        <input
            type="text"
            name="cpf"
            class="form-control"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Telefone
        </label>

        <input
            type="tel"
            name="telefone"
            class="form-control"
            required>

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Cadastrar Passageiro

    </button>

</form>

<?php

$result = $pdo->query("
    SELECT *
    FROM passageiros
");

$passageiros = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table table-striped table-hover mt-4">

    <thead>

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($passageiros as $passageiro): ?>

        <tr>

            <td><?= $passageiro['id'] ?></td>

            <td><?= $passageiro['nome'] ?></td>

            <td><?= $passageiro['cpf'] ?></td>

            <td><?= $passageiro['telefone'] ?></td>

            <td>

                <button
                    type="button"
                    class="btn btn-warning"
                    onclick="window.location.href='editarPassageiro.php?id=<?= $passageiro['id'] ?>'">

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