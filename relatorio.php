<?php
require("cabecalho.php");
require("conexao.php");

$viagens = [];

if (isset($_GET['inicio']) && isset($_GET['fim'])) {

    $inicio = $_GET['inicio'];
    $fim = $_GET['fim'];

    $stmt = $pdo->prepare("
        SELECT
            v.id,
            v.data_viagem,
            p.nome AS passageiro,
            e.nome_estacao,
            l.cidade_origem,
            l.cidade_destino

        FROM viagens v

        INNER JOIN passageiros p
            ON p.id = v.id_passageiro

        INNER JOIN estacoes e
            ON e.id = v.id_estacao

        INNER JOIN linhas l
            ON l.id = v.id_linha

        WHERE v.data_viagem BETWEEN ? AND ?

        ORDER BY v.data_viagem ASC
    ");

    $stmt->execute([$inicio, $fim]);

    $viagens = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container mt-4">

<h1>Relatório de Viagens</h1>

<form method="get" class="row g-3 mb-4">

    <div class="col-md-5">

        <label>Data Inicial</label>

        <input
            type="date"
            name="inicio"
            class="form-control"
            required>

    </div>

    <div class="col-md-5">

        <label>Data Final</label>

        <input
            type="date"
            name="fim"
            class="form-control"
            required>

    </div>

    <div class="col-md-2 d-flex align-items-end">

        <button class="btn btn-primary w-100">
            Gerar
        </button>

    </div>

</form>

<table class="table table-striped">

    <thead>

        <tr>

            <th>ID</th>
            <th>Passageiro</th>
            <th>Linha</th>
            <th>Estação</th>
            <th>Data</th>

        </tr>

    </thead>

    <tbody>

        <?php if(count($viagens) > 0): ?>

            <?php foreach($viagens as $v): ?>

                <tr>

                    <td><?= $v['id'] ?></td>

                    <td><?= $v['passageiro'] ?></td>

                    <td>
                        <?= $v['cidade_origem'] ?>
                        →
                        <?= $v['cidade_destino'] ?>
                    </td>

                    <td><?= $v['nome_estacao'] ?></td>

                    <td><?= $v['data_viagem'] ?></td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="5" class="text-center">
                    Nenhuma viagem encontrada
                </td>

            </tr>

        <?php endif; ?>

    </tbody>

</table>

</div>

<?php require("rodape.php"); ?>