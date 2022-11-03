<?php
include("conexao.php");

$item = $_GET["filtro1"];

if ($item == 1){
    $comando = $pdo->prepare("SELECT id_item, foto, nome_item FROM item");

    $comando->execute();
}else{
    $comando = $pdo->prepare("SELECT id_item, foto, nome_item FROM item WHERE tipo_arma = '$item'");
    $comando->execute();
}




if ($comando->rowCount() >= 1) {
    $listaItens = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}

unset($comando);
unset($pdo);