<?php
include("conexao.php");


$pesquisa = $_GET["filtro1"];




    if ($pesquisa <> null){
        if ($pesquisa == 1){
            $comando = $pdo->prepare("SELECT id_item, foto, nome_item FROM item");
    
            $comando->execute();
        }else{
            $comando = $pdo->prepare("SELECT id_item, foto, nome_item FROM item WHERE nome_item LIKE '%$pesquisa%'");
    
            $comando->execute();
        }
    }else{
        $comando = $pdo->prepare("SELECT id_item, foto, nome_item FROM item WHERE tipo_arma = '$pesquisa'");
        $comando->execute();
    }




if ($comando->rowCount() >= 1) {
    $listaItens = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}


unset($comando);
unset($pdo);