<?php
require("cabecalho.php");
require("conexao.php");

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("
    SELECT *
    FROM viagens
    WHERE id = ?
");

$stmt->execute([$id]);

$viagem = $stmt->fetch(PDO::FETCH_ASSOC);

$passageiros = $pdo->query("
    SELECT *
    FROM passageiros
")->fetchAll(PDO::FETCH_ASSOC);

$linhas = $pdo->query("
    SELECT *
    FROM linhas
")->fetchAll(PDO::FETCH_ASSOC);

$estacoes = $pdo->query("
    SELECT *
    FROM estacoes
")->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_POST['id'];
    $id_passageiro = $_POST['id_passageiro'];
    $id_linha = $_POST['id_linha'];
    $id_estacao = $_POST['id_estacao'];
    $data_viagem = $_POST['data_viagem'];

    $stmt = $pdo->prepare("
        UPDATE viagens
        SET
            id_passageiro = ?,
            id_linha = ?,
            id_estacao = ?,
            data_viagem = ?
        WHERE id = ?
    ");

    if($stmt->execute([
        $id_passageiro,
        $id_linha,
        $id_estacao,
        $data_viagem,
        $id
    ])){

        header("Location: novaViagem.php?editar=true");
        exit;

    }else{

        echo "
        <div class='alert alert-danger'>
            Erro ao atualizar.
        </div>";
    }
}
?>

<h1>Editar Viagem</h1>

<form method="post">

    <input
        type="hidden"
        name="id"
        value="<?= $viagem['id'] ?>"
    >

    <div class="mb-3">

        <label class="form-label">
            Passageiro
        </label>

        <select
            name="id_passageiro"
            class="form-control">

            <?php foreach($passageiros as $p): ?>

                <option
                    value="<?= $p['id'] ?>"
                    <?= $p['id'] == $viagem['id_passageiro'] ? 'selected' : '' ?>>

                    <?= $p['nome'] ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Linha
        </label>

        <select
            name="id_linha"
            class="form-control">

            <?php foreach($linhas as $l): ?>

                <option
                    value="<?= $l['id'] ?>"
                    <?= $l['id'] == $viagem['id_linha'] ? 'selected' : '' ?>>

                    <?= $l['cidade_origem'] ?>
                    →
                    <?= $l['cidade_destino'] ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Estação
        </label>

        <select
            name="id_estacao"
            class="form-control">

            <?php foreach($estacoes as $e): ?>

                <option
                    value="<?= $e['id'] ?>"
                    <?= $e['id'] == $viagem['id_estacao'] ? 'selected' : '' ?>>

                    <?= $e['nome_estacao'] ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Data da Viagem
        </label>

        <input
            type="date"
            name="data_viagem"
            class="form-control"
            value="<?= $viagem['data_viagem'] ?>">
    </div>

    <button class="btn btn-primary">
        Salvar Alterações
    </button>

</form>

<?php require("rodape.php"); ?>