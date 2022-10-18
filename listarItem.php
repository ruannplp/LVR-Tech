<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT foto, nome_item FROM item;");

$comando->execute();

if ($comando->rowCount() >= 1) {
    $listaItens = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}

unset($comando);
unset($pdo);