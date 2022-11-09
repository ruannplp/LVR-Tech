<?php
session_start();
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: TelaLogin.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tela de Perfil</title>
    <link rel="stylesheet" href="estiloTelaCompra.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>




<div class="row" id="tela_inteira">
        <div class="col-2 text-center" style="background-color: #1A2327;">
        <div class="row" id="tela_inteira">
        <div class="col-2 text-center" style="background-color: #1A2327;     box-shadow: inset 2px 2px 100px 0px #0E1316;">
        <a href="telaInicial_Backup.php?filtro1=1"><img src="imagens/logo.png" width="70%"  alt="sem foto"></a>

        <br>



<a style="text-decoration: none;" href="telaPerfil.php">


    <?php

            include("listar_usuario_conectado.php");

            echo '<img style="height: 120px; width: 120px; border-radius: 50%; margin-top: 8%;" class="mt-3"  src="'.$info_usuarios['foto'].'">';

    ?>
<br>
    <?php

            include("listar_usuario_conectado.php");

            echo"<p style='color: #9A9A9D'> ".$info_usuarios['usuario_nome']."</p>";

    ?>
</a>


<a href="telaCompra.php"> <div class="text-center" style="border-radius: 10px;width: 10%; height: 50px; position: absolute; top: 93%; left: 3.8%; color: white; background-color: #13191C; "> <p style="margin: 0px; position: absolute; left: 27.8%; top: 22%;"> Ver Carrinho </p> </div> </a>

<form action="sair.php" method="POST" enctype="multipart/form-data">
<input type="submit" class="btn" href="sair.php" value="Sair" style="color: white; background-color: #13191C">
</form>





        </div>
        



    </div>



    


          

    </div>
    

    <form action="UpdateUsuario.php" method="POST" enctype="multipart/form-data">

    <div id="retangulodadireita"> 

       
          
    <?php 
                include("listarCarrinho.php");

                if (!empty($listaCarrinho)) {
                    foreach($listaCarrinho as $linha) { 
            ?>

                    <a style="text-decoration: none;" href="telaDoItem.php?id_item=<?php echo $linha['id_item'];?>"> 
                        <div class="col" id="quadrado">

                        
                            <?php echo '<img style="position: relative; margin-top: 1%;" width="20%" src="'.$linha['foto'].'">';?>  

                            <?php echo"<p style='position: relative;color: #9A9A9D; margin-left: 25%; margin-top: -8%;  '>".$linha['nome_item']."</p>";?> 

                            <?php echo"<p style='position: relative; color: #9A9A9D; margin-left: 87%; margin-top: -0%; '> R$".$linha['valor']."</p>";?> 


                            <button style="background-color: #2907B2; color: white; margin-top: -17%; margin-left: 85%;" type="button" class="btn"> Comprar </button>
                        </div>
                    </a>       


            <?php
                    }
                }
            ?>   





    </div>

            </form>


</div>
</body>

</html>