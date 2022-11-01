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
            <img id="foto_perfil" src="imagens/foto_perfil.png" class="rounded-circle mt-5" alt="sem foto">


            
        <?php

include("listar_usuario_conectado.php");

echo"<p style='color: #9A9A9D'> ".$info_usuarios['usuario_nome']."</p>";

?>


<form action="sair.php" method="POST" enctype="multipart/form-data">
<input type="submit" class="btn"href="sair.php" value="Sair" style="color: white">
</form>

            <select id="filtro" class="text-center form-select bg-dark w-75 mx-auto fs-6 fw-bold mt-5 "
                aria-label="Default select example" style="color: #9A9A9D">
                <option disabled selected>Ordenar por</option>
                <option value="1">Mais Barato</option>
                <option value="2">Mais Caro</option>
                <option value="3">Novidades</option>
            </select>




        </div>

        <div class="col-10 mx-0" style="background-color: #253239;">
            <div class="row justify-content-center" id="area_util">
                <div class="text-center py-3" id="barra_navegacao">
                    <img id="imagem" src="imagens/csgo.png">

                    <img id="imagem" src="imagens/league_of_legends.png">

                    <img id="imagem" src="imagens/dota2.png">

                    <img id="imagem" src="imagens/valorant.png">

                    <img id="imagem" src="imagens/rocket_league.png">
                </div>
            </div>
        </div>

        <div id="divComprar" style="background-color: #1A2327;" class="mt-5 w-75 container rounded-5 py-4 px-3 position-absolute">
        <?php 
                include("listarCarrinho.php");

                if (!empty($listaCarrinho)) {
                    foreach($listaCarrinho as $linha) { 
            ?>
                           <div class="col" id="quadrado">  <?php echo '<img height="70%" width="10%" src="'.$linha['foto'].'">';?>  <?php echo $linha['nome_item'];?> <?php echo $linha['raridade'];?> <?php echo"<p style='color: #9A9A9D'> R$".$linha['valor']."</p>";?> </div>



            <?php
                    }
                }
            ?>   

            </div>




        </div>

    </div>



</body>

</html>