<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cadastro de Usuário</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>

    body{
      background-color:#f5f5f5;
    }

    .card{
      border:none;
      box-shadow:0 0 15px rgba(0,0,0,0.2);
    }

    .titulo{
      color:#0d6efd;
      font-weight:bold;
    }

    .btn-custom{
      background:#0d6efd;
      color:white;
      font-weight:bold;
    }

    .btn-custom:hover{
      background:#0b5ed7;
      color:white;
    }

  </style>

</head>

<body>

<div class="container mt-3">

    <a href="index.php" class="btn btn-outline-primary">
        ← Voltar
    </a>

</div>

<div class="container d-flex justify-content-center align-items-center" style="min-height:90vh;">

    <div class="card p-4" style="width:100%; max-width:500px;">

        <h2 class="text-center mb-4 titulo">
            Cadastro de Usuário
        </h2>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Nome</label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>

                <input
                    type="password"
                    name="senha"
                    class="form-control"
                    required>
            </div>

            <button type="submit" class="btn btn-custom w-100">
                Cadastrar
            </button>

        </form>

        <p class="text-center mt-3">

            Já possui conta?

            <a href="index.php">
                Fazer Login
            </a>

        </p>

    </div>

</div>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

    require("conexao.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    try{

        $stmt = $pdo->prepare(
            "INSERT INTO usuario
            (nome,email,senha)
            VALUES
            (?,?,?)"
        );

        if($stmt->execute([$nome,$email,$senha])){

            header("location:index.php?cadastro=true");

        }else{

            header("location:index.php?cadastro=false");

        }

    }catch(Exception $e){

        echo "
        <div class='container mt-3'>
            <div class='alert alert-danger'>
                Erro: {$e->getMessage()}
            </div>
        </div>";
    }
}

?>

</body>
</html>