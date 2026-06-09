<?php
    require("cabecalho.php");
    require("conexao.php");

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM estacoes WHERE id = ?");
    $stmt->execute([$id]);
    $estacao = $stmt->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id = $_POST['id'];
        $nome_estacao = $_POST['nome_estacao'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];

        try{

            $stmt = $pdo->prepare("
                UPDATE estacoes
                SET
                    nome_estacao = ?,
                    endereco = ?,
                    cidade = ?
                WHERE id = ?
            ");

            if($stmt->execute([
                $nome_estacao,
                $endereco,
                $cidade,
                $id
            ])){

                header("location: novaEstacao.php?editar=true");

            }else{

                header("location: novaEstacao.php?editar=false");

            }

        }catch(Exception $e){

            echo "Erro ao editar: ".$e->getMessage();

        }
    }

?>

<h1>Editar Estação</h1>

<form method="post">

    <input
        type="hidden"
        name="id"
        value="<?= $estacao['id'] ?>"
    >

    <div class="mb-3">

        <label class="form-label">
            Nome da Estação
        </label>

        <input
            type="text"
            name="nome_estacao"
            class="form-control"
            value="<?= $estacao['nome_estacao'] ?>"
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Endereço
        </label>

        <input
            type="text"
            name="endereco"
            class="form-control"
            value="<?= $estacao['endereco'] ?>"
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Cidade
        </label>

        <input
            type="text"
            name="cidade"
            class="form-control"
            value="<?= $estacao['cidade'] ?>"
        >

    </div>

    <button
        type="submit"
        class="btn btn-primary"
    >
        Salvar Alterações
    </button>

</form>

<?php
    require("rodape.php");
?>