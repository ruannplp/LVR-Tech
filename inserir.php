<?php
    include("conexao.php");

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = MD5($_POST["senha"]);
    $foto = ($_POST["foto"]);
    $comando = $pdo -> prepare("INSERT INTO user(usuario_nome,email_usuario,senha_usuario,foto) VALUES(:usuario,:email,:senha,:foto)");
    $comando->bindValue(":usuario",$usuario); 
    $comando->bindValue(":email",$email);                                     
    $comando->bindValue(":senha",$senha);    
    $comando->bindValue(":foto",$foto);    
    $comando->execute();                               

    header("Location:telaLogin.html");
?>