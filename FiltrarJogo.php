<?php
include("conexao.php");

$jogo = $_GET["filtro_jogo"];

$comando = $pdo->prepare("SELECT id_item, foto, nome_item FROM item WHERE jogo_item = '$jogo'");

$comando->execute();

if ($comando->rowCount() >= 1) {
    $listaItens = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}

unset($comando);
unset($pdo);