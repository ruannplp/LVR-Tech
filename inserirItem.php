<?php
    include("conexao.php");

    $nome_item = $_POST["nome_item"];
    $raridade = $_POST["raridade"];
    $tipo_arma = $_POST["tipo_arma"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];


    $imagem = $_FILES['imagem']; 
    $extensao = $imagem['type'];
    $conteudo = file_get_contents($imagem['tmp_name']);
    $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);



    $comando = $pdo -> prepare("INSERT INTO item(nome_item,raridade, tipo_arma, descricao,valor,foto) VALUES(:nome_item,:raridade, :tipo_arma, :descricao,:valor,:conteudo)");

    $comando->bindValue(":nome_item",$nome_item); 
    $comando->bindValue(":tipo_arma",$tipo_arma); 
    $comando->bindValue(":raridade",$raridade); 
    $comando->bindValue(":descricao",$descricao); 
    $comando->bindValue(":valor",$valor); 

    
    $comando->bindValue(":conteudo", $base64);

    $comando->execute();                               

    header("Location:telaAddItem.html");

    unset($comando);
    unset($pdo);
?>