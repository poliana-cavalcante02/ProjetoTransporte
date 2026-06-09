<?php
    require("cabecalho.php");
    require("conexao.php");

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM passageiros WHERE id = ?");
    $stmt->execute([$id]);
    $passageiro = $stmt->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        try{

            $stmt = $pdo->prepare("
                UPDATE passageiros
                SET
                    nome = ?,
                    cpf = ?,
                    telefone = ?
                WHERE id = ?
            ");

            if($stmt->execute([
                $nome,
                $cpf,
                $telefone,
                $id
            ])){

                header("location: novoPassageiro.php?editar=true");

            }else{

                header("location: novoPassageiro.php?editar=false");

            }

        }catch(Exception $e){

            echo "Erro ao editar: ".$e->getMessage();

        }
    }
?>

<h1>Editar Passageiro</h1>

<form method="post">

    <input
        type="hidden"
        name="id"
        value="<?= $passageiro['id'] ?>"
    >

    <div class="mb-3">

        <label class="form-label">
            Nome
        </label>

        <input
            type="text"
            name="nome"
            class="form-control"
            value="<?= $passageiro['nome'] ?>"
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            CPF
        </label>

        <input
            type="text"
            name="cpf"
            class="form-control"
            value="<?= $passageiro['cpf'] ?>"
        >

    </div>

    <div class="mb-3">

        <label class="form-label">
            Telefone
        </label>

        <input
            type="text"
            name="telefone"
            class="form-control"
            value="<?= $passageiro['telefone'] ?>"
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