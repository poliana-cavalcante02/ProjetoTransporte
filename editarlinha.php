<?php
require("cabecalho.php");
require("conexao.php");

$id = $_GET['id'];

$stmt = $pdo->prepare("
    SELECT *
    FROM linhas
    WHERE id = ?
");

$stmt->execute([$id]);

$linha = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_POST['id'];
    $cidade_origem = $_POST['cidade_origem'];
    $cidade_destino = $_POST['cidade_destino'];
    $horario_saida = $_POST['horario_saida'];
    $horario_chegada = $_POST['horario_chegada'];

    try{

        $stmt = $pdo->prepare("
            UPDATE linhas
            SET
                cidade_origem = ?,
                cidade_destino = ?,
                horario_saida = ?,
                horario_chegada = ?
            WHERE id = ?
        ");

        if($stmt->execute([
            $cidade_origem,
            $cidade_destino,
            $horario_saida,
            $horario_chegada,
            $id
        ])){

            header("location:novaLinha.php?editar=true");

        }else{

            header("location:novaLinha.php?editar=false");

        }

    }catch(Exception $e){

        echo "Erro ao editar: ".$e->getMessage();

    }
}
?>

<h1>Editar Linha</h1>

<form method="post">

    <input
        type="hidden"
        name="id"
        value="<?= $linha['id'] ?>">

    <div class="mb-3">

        <label class="form-label">
            Cidade de Origem
        </label>

        <input
            type="text"
            name="cidade_origem"
            value="<?= $linha['cidade_origem'] ?>"
            class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">
            Cidade de Destino
        </label>

        <input
            type="text"
            name="cidade_destino"
            value="<?= $linha['cidade_destino'] ?>"
            class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">
            Horário de Saída
        </label>

        <input
            type="time"
            name="horario_saida"
            value="<?= $linha['horario_saida'] ?>"
            class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">
            Horário de Chegada
        </label>

        <input
            type="time"
            name="horario_chegada"
            value="<?= $linha['horario_chegada'] ?>"
            class="form-control">

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Salvar Alterações

    </button>

</form>

<?php
require("rodape.php");
?>