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
            header("location:telaInicial_Backup.php?filtro1=1");

            session_start();
            $_SESSION['usuario_id'] = $resultado['usuario_id'];
            $_SESSION['is_admin'] = $resultado['is_admin'];
            $_SESSION['loggedin'] = true; 

        }else{
            echo ("<script>alert('Email ou senha incorretos!');</script>");


        }

    }else{
        echo ("<script>alert('Email ou senha incorretos!');</script>");

    }






    unset($comando);
    unset($pdo);


?>
