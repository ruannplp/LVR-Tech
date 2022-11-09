<?php
include("conexao.php");


$pesquisa = $_GET["filtro1"];





if($pesquisa == 'asc'){

    $comando = $pdo->prepare("SELECT id_item, foto, nome_item, valor FROM item ORDER BY valor ASC");
    
    $comando->execute();

}else{


if($pesquisa == 'desc'){
    $comando = $pdo->prepare("SELECT id_item, foto, nome_item, valor FROM item ORDER BY valor DESC");
    
    $comando->execute();
    
}else{

    if ($pesquisa <> null){
        if ($pesquisa == 1){
            $comando = $pdo->prepare("SELECT id_item, foto, nome_item, valor FROM item");
    
            $comando->execute();
        }else{
            $comando = $pdo->prepare("SELECT id_item, foto, nome_item, valor FROM item WHERE descricao LIKE '%$pesquisa%'");
    
            $comando->execute();
        }
    }

}

}
if ($comando->rowCount() >= 1) {
    $listaItens = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}


unset($comando);
unset($pdo);