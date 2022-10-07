<?php
    include("conexao.php");
     
    $email = $_POST["email"];
    $set_senha = $_POST["senha"];

    $comando = $pdo-> prepare("SELECT usuario_id, senha_usuario, is_admin FROM user WHERE email_usuario = :email");



    $comando->bindValue(":email",$email);
    $comando->execute();

    if($comando->rowCount() == 1)
    {
        $resultado = $comando->fetch();

        




        if($resultado['senha_usuario'] == MD5($set_senha)){
            header("location:telaLOL.html");

            session_start();
            $_SESSION['usuario_id'] = $resultado['usuario_id'];
            $_SESSION['is_admin'] = $resultado['is_admin'];
            $_SESSION['loggedin'] = true; 

        }else{
            echo("Email ou Senha incorreto!");
        }

    }else{
        echo("Email ou Senha incorreto!");
    }




    unset($comando);
    unset($pdo);

?>