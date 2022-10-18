<?php
    include("conexao.php");

    $nome_item = $_POST["nome_item"];
    $nome_jogo = $_POST["nome_jogo"];
    $raridade = $_POST["raridade"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];


    $imagem = $_FILES['imagem']; 
    $extensao = $imagem['type'];
    $conteudo = file_get_contents($imagem['tmp_name']);
    $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);



    $comando = $pdo -> prepare("INSERT INTO item(nome_item,jogo_item,raridade,descricao,valor,foto) VALUES(:nome_item,:nome_jogo,:raridade,:descricao,:valor,:conteudo)");

    $comando->bindValue(":nome_item",$nome_item); 
    $comando->bindValue(":nome_jogo",$nome_jogo); 
    $comando->bindValue(":raridade",$raridade); 
    $comando->bindValue(":descricao",$descricao); 
    $comando->bindValue(":valor",$valor); 

    
    $comando->bindValue(":conteudo", $base64);

    $comando->execute();                               

    header("Location:telaAddItem.html");

    unset($comando);
    unset($pdo);
?>