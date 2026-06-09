<?php

$dominio = "mysql:host=localhost;dbname=transporte_publico;charset=utf8";

$usuario = "root";
$senha = "";

try {

    $pdo = new PDO($dominio, $usuario, $senha);

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (Exception $e) {

    die(
        "Erro ao conectar ao banco! " .
        $e->getMessage()
    );

}

?>