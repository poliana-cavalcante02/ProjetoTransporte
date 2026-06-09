<?php
require("cabecalho.php");
require("conexao.php");

$passageiros = $pdo->query("
    SELECT * FROM passageiros
")->fetchAll(PDO::FETCH_ASSOC);

$linhas = $pdo->query("
    SELECT * FROM linhas
")->fetchAll(PDO::FETCH_ASSOC);

$estacoes = $pdo->query("
    SELECT * FROM estacoes
")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_passageiro = $_POST['id_passageiro'];
    $id_linha = $_POST['id_linha'];
    $id_estacao = $_POST['id_estacao'];

    $data_viagem = date('Y-m-d');

    $stmt = $pdo->prepare("
        INSERT INTO viagens
        (
            id_passageiro,
            id_linha,
            id_estacao,
            data_viagem
        )
        VALUES
        (
            ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $id_passageiro,
        $id_linha,
        $id_estacao,
        $data_viagem
    ]);

    header("Location: novaViagem.php?sucesso=true");
    exit;
}
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Nova Viagem</h1>

        <a href="principal.php"
           class="btn btn-outline-secondary">
            ← Voltar
        </a>

    </div>

<form method="post">

    <div class="mb-3">

        <label>Passageiro</label>

        <select
            name="id_passageiro"
            class="form-control"
            required>

            <option value="">
                Selecione
            </option>

            <?php foreach($passageiros as $p): ?>

                <option value="<?= $p['id'] ?>">
                    <?= $p['nome'] ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Linha</label>

        <select
            name="id_linha"
            class="form-control"
            required>

            <option value="">
                Selecione
            </option>

            <?php foreach($linhas as $l): ?>

                <option value="<?= $l['id'] ?>">
                    <?= $l['cidade_origem'] ?>
                    →
                    <?= $l['cidade_destino'] ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Estação</label>

        <select
            name="id_estacao"
            class="form-control"
            required>

            <option value="">
                Selecione
            </option>

            <?php foreach($estacoes as $e): ?>

                <option value="<?= $e['id'] ?>">
                    <?= $e['nome_estacao'] ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <button class="btn btn-primary">
        Registrar Viagem
    </button>

</form>

</div>

<?php require("rodape.php"); ?>