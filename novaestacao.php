<?php
    require("cabecalho.php");
    require("conexao.php");

    if(isset($_POST['nome_estacao'])){

        $nome_estacao = $_POST['nome_estacao'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];

        $sql = "
            INSERT INTO estacoes
            (
                nome_estacao,
                endereco,
                cidade
            )
            VALUES
            (
                '$nome_estacao',
                '$endereco',
                '$cidade'
            )
        ";

        $pdo->query($sql);
    }
?>

<body class="bg-light">

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Cadastro de Estações</h1>

        <a href="principal.php"
           class="btn btn-outline-secondary">

            ← Voltar

        </a>

    </div>

    <form method="post" class="row g-3 mb-4">

        <div class="col-md-4">

            <label class="form-label">
                Nome da Estação
            </label>

            <input
                type="text"
                name="nome_estacao"
                class="form-control"
                required>

        </div>

        <div class="col-md-4">

            <label class="form-label">
                Endereço
            </label>

            <input
                type="text"
                name="endereco"
                class="form-control"
                required>

        </div>

        <div class="col-md-4">

            <label class="form-label">
                Cidade
            </label>

            <input
                type="text"
                name="cidade"
                class="form-control"
                required>

        </div>

        <div class="col-12">

            <button
                type="submit"
                class="btn btn-primary w-100">

                Cadastrar Estação

            </button>

        </div>

    </form>

<?php

$result = $pdo->query("
    SELECT *
    FROM estacoes
");

$estacoes = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table table-striped table-hover">

    <thead>

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($estacoes as $estacao): ?>

        <tr>

            <td><?= $estacao['id'] ?></td>

            <td><?= $estacao['nome_estacao'] ?></td>

            <td><?= $estacao['endereco'] ?></td>

            <td><?= $estacao['cidade'] ?></td>

            <td>

                <button
                    type="button"
                    class="btn btn-warning"
                    onclick="window.location.href='editarEstacao.php?id=<?= $estacao['id'] ?>'">

                    Editar

                </button>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

</div>

</body>
</html>