<?php

include("conexao.php");


$id_usuario = $_SESSION["usuario_id"];

$comando = $pdo->prepare("SELECT * FROM user WHERE usuario_id = $id_usuario");
$comando->bindValue(":usuario_id", $_SESSION["usuario_id"]);
$comando->execute();

$comando->execute();

if ($comando->rowCount() >= 1) {
    $listaPerfil = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}

?>