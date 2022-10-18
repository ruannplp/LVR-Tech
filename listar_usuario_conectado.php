<?php
    include("conexao.php");

    $comando = $pdo -> prepare("SELECT usuario_nome FROM user WHERE usuario_id = :usuario_id");
    $comando->bindValue(":usuario_id", $_SESSION["usuario_id"]);
    $comando->execute();
    
    if($comando->rowCount() >= 1)
    {
        $info_usuarios = $comando->fetch();
        
    }else
    {
        echo("Não há usuários cadastrados.");
    }

    unset($comando);
    unset($pdo);
?>  