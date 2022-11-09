<?php
include("conexao.php");




$comando = $pdo->prepare("SELECT id_item, foto, nome_item FROM item WHERE nome_item LIKE 'AW%'");

$comando->execute();

if ($comando->rowCount() >= 1) {
    $listaItens = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}




unset($comando);
unset($pdo);