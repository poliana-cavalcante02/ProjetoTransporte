<?php

if (isset($_GET['cadastro'])) {

    // Mensagem de retorno do cadastro de usuário

    $cadastro = $_GET['cadastro'];

    if ($cadastro) {

        echo "<p class='text-success'>
                Cadastro realizado com sucesso!
              </p>";

    } else {

        echo "<p class='text-danger'>
                Erro ao realizar o cadastro!
              </p>";
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

    require('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try{

        $stmt = $pdo->prepare("
            SELECT *
            FROM usuario
            WHERE email = ?
        ");

        $stmt->execute([$email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if(
            $usuario &&
            password_verify($senha, $usuario['senha'])
        ){

            session_start();

            $_SESSION['acesso'] = true;
            $_SESSION['nome'] = $usuario['nome'];

            header('location: principal.php');

        }else{

            echo "
            <p class='text-danger'>
                Credenciais inválidas!
            </p>";
        }

    }catch(Exception $e){

        echo "
        Erro:
        ".$e->getMessage();

    }
}

?>