<?php
    include("conexao.php");

    session_start();

    $id_usuario = $_SESSION['usuario_id'];
    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $nascimento_usuario = $_POST['nascimento_usuario'];


    $imagem = $_FILES['imagem']; 
    $extensao = $imagem['type'];
    $conteudo = file_get_contents($imagem['tmp_name']);
    $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);


    $comando = $pdo -> prepare("UPDATE user SET `usuario_nome`='$nome_usuario',`email_usuario`='$email_usuario',`data_nascimento`='$nascimento_usuario', foto = :conteudo WHERE usuario_id = $id_usuario");

    $comando->bindValue(":conteudo", $base64);

    $comando->execute();                               

    header("Location:telaPerfil.php");
?>