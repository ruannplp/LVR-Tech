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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clk.store</title>
    <link rel="stylesheet" href="estiloTelaCompra.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
</head>

<body style="background-color: #253239; overflow-x: hidden">

    <div class="row" id="tela_inteira">
        <div class="col-2 text-center " style="background-color: #1A2327;">




        <a href="telaInicial_Backup.php?filtro1=1"><img src="imagens/logo.png" width="70%"  alt="sem foto"></a>




            <img id="foto_perfil" src="imagens/foto_perfil.png" class="rounded-circle mt-5" alt="sem foto">


            
        <?php

include("listar_usuario_conectado.php");

echo"<p style='color: #9A9A9D'> ".$info_usuarios['usuario_nome']."</p>";

?>


<form action="sair.php" method="POST" enctype="multipart/form-data">
<input type="submit" class="btn"href="sair.php" value="Sair" style="color: white">
</form>






        </div>


        <div id="divComprar" style="background-color: #1A2327;" class="mt-5 w-75 container rounded-5 py-4 px-3 position-absolute">
        <?php 
                include("listarCarrinho.php");

                if (!empty($listaCarrinho)) {
                    foreach($listaCarrinho as $linha) { 
            ?>

                    <a  href="telaDoItem.php?id_item=<?php echo $linha['id_item'];?>"> 
                        <div class="col" id="quadrado">

                        
                           <?php echo '<img style="position: fixed; margin-top: 1%;" width="10%" src="'.$linha['foto'].'">';?>  


                           <?php echo"<p style='color: #9A9A9D; position: fixed; left: 35%; margin-top: 3.7%;'>".$linha['nome_item']."</p>";?> 

                            <?php echo"<p style='color: #9A9A9D; position: fixed; left: 86%; margin-top: 5.5%;'> R$".$linha['valor']."</p>";?> 


                            <button style="position: fixed;left: 85%; background-color: #2907B2; color: white; margin-top: 3.6%;" type="button" class="btn"> Comprar </button>
                        </div>
                    </a>       


            <?php
                    }
                }
            ?>   

            </div>




        </div>

    </div>



</body>

</html>