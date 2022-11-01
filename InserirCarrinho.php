<?php
    include("conexao.php");

    session_start();


    $id_usuario = $_SESSION["usuario_id"];
    $nome_item = $_POST["nome_item"];
    $valor = $_POST["valor"];
    $raridade = $_POST["raridade"];
    $foto = $_POST["foto"];




    $comando = $pdo -> prepare("INSERT INTO carrinho(id_usuario, valor, raridade, nome_item, foto) VALUES(:id_usuario, :valor, :raridade, :nome_item, :foto)");


    $comando->bindValue(":id_usuario",$id_usuario); 
    $comando->bindValue(":nome_item",$nome_item); 
    $comando->bindValue(":valor",$valor); 
    $comando->bindValue(":raridade",$raridade); 
    $comando->bindValue(":foto",$foto); 


    $comando->execute();                               



    unset($comando);
    unset($pdo);

    header("Location:telaInicial_Backup.php?filtro_jogo=CSGO");

?>