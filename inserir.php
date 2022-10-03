<?php
    include("conexao.php");

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = MD5($_POST["senha"]);
    $comando = $pdo -> prepare("INSERT INTO user(usuario_nome,email_usuario,senha_usuario) VALUES(:usuario,:email,:senha)");
    $comando->bindValue(":usuario",$usuario); 
    $comando->bindValue(":email",$email);                                     
    $comando->bindValue(":senha",$senha);    
    $comando->execute();                               

    header("Location:telaLogin.html");
?>