<?php

include("conexao.php");

$comando = $pdo->prepare("SELECT * FROM item WHERE id_item = $id_item");

$comando->execute();

if ($comando->rowCount() >= 1) {
    $listaItens = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}

?>