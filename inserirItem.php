<?php
    include("conexao.php");

    $nome_item = $_POST["nome_item"];
    $nome_jogo = $_POST["nome_jogo"];
    $raridade = $_POST["raridade"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];



    $comando = $pdo -> prepare("INSERT INTO item(nome_item,jogo_item,raridade,descricao,valor) VALUES(:nome_item,:nome_jogo,:raridade,:descricao,:valor)");
    $comando->bindValue(":nome_item",$nome_item); 
    $comando->bindValue(":nome_jogo",$nome_jogo); 
    $comando->bindValue(":raridade",$raridade); 
    $comando->bindValue(":descricao",$descricao); 
    $comando->bindValue(":valor",$valor); 

    $comando->execute();                               

    header("Location:telaAddItem.html");
?>