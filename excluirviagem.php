<?php
require("conexao.php");

$id = $_GET['id'];

try {

    $stmt = $pdo->prepare("
        DELETE FROM viagens
        WHERE id = ?
    ");

    if ($stmt->execute([$id])) {

        header("Location: novaViagem.php?excluir=true");

    } else {

        header("Location: novaViagem.php?excluir=false");

    }

} catch(Exception $e) {

    echo "Erro ao excluir: " . $e->getMessage();

}
?>