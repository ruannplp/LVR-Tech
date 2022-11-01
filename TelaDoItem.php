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
    <title>Tela do Item</title>
    <link rel="stylesheet" href="estiloTelaDoItem.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <?php

        $id_item = $_GET["id_item"];

    ?>
</head>
<body>
<div id="tela_inteira">

<div class="col-2 text-center" style="background-color: #1A2327; height: 100%; width: 16.06%">


        <img id="foto_perfil" src="imagens/foto_perfil.png" class="rounded-circle mt-5"  alt="sem foto">


        <?php

            include("listar_usuario_conectado.php");

            echo"<p style='color: #9A9A9D'> ".$info_usuarios['usuario_nome']."</p>";

        ?>


        <form action="sair.php" method="POST" enctype="multipart/form-data">
            <input type="submit" class="btn"href="sair.php" value="Sair" style="color: white">
        </form>


                <select id="filtro" class="text-center form-select w-75 mx-auto fs-6 fw-bold mt-5 " aria-label="Default select example" style="background-color: #13191C; color: #9A9A9D">
                        <option disabled selected>Ordenar por</option>
                        <option value="1">Mais Barato</option>
                        <option value="2">Mais Caro</option>
                        <option value="3">Novidades</option>
                </select>




</div>









    <div id="retangulodomeio">

            <?php 
            include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            
                            echo '<img height="100%" width="100%" src="'.$linha['foto'].'">';

                    }
                }
            ?>    

    </div>
    
    

    <form action="InserirCarrinho.php?id_item=<?php echo $_GET['id_item'];?>" method="POST" enctype="multipart/form-data">


            <?php 
                include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            ?>
                           <input name="nome_item" class="col" id="quadrado" value="<?php echo $linha['nome_item'];?>">  



            <?php
                    }
                }
            ?>   

            <?php 
                include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            ?>
                           <input name="foto" class="col" id="quadrado" value="<?php echo $linha['foto'];?>">  



            <?php
                    }
                }
            ?>   



            <?php 
                include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            ?>
                           <input name="valor" class="col" id="quadrado" value="<?php echo $linha['valor'];?>">  



            <?php
                    }
                }
            ?>   

            <?php 
                include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            ?>
                           <input name="raridade" class="col" id="quadrado" value="<?php echo $linha['raridade'];?>">  



            <?php
                    }
                }
            ?>   





    <div id="retangulodadireita"> 

            <div id="retangulo_descricao"> 

            <div style="color: #9A9A9D;position: absolute; width: 100%; height: 100%; top: 7px;" class="text-center">
            <?php 
            include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            
                        echo $linha['descricao'];

                    }
                }
            ?>      
            </div>

            </div>


            <div id="retangulo_valor" > 
            <div style="color: #9A9A9D;position: absolute; width: 100%; height: 100%; top: 15%; font-size: 20px;" class="text-center">
            
            <?php 
            include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            
                        echo"<p style='color: #9A9A9D'> R$".$linha['valor']."</p>";

                    }
                }
            ?>
            </div>
            </div>

            <div  id="retangulo_nomeItem"> 
            
            <div style="color: #9A9A9D;position: absolute; width: 100%; height: 100%; top: 15%; font-size: 20px;" class="text-center">
            <?php 
            include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            
                        echo $linha['nome_item'];

                    }
                }
            ?>      
            </div>


            </div>

            <div id="retangulo_raridade">
            
            <div style="color: #9A9A9D;position: absolute; width: 100%; height: 100%; top: 15%; font-size: 20px;" class="text-center">
            <?php 
            include("listaUmItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            
                        echo $linha['raridade'];

                    }
                }
            ?>      
            </div>

            </div>

            <input type="submit" class="btn text-center" id="retangulo_addCarrinho" value="Adicionar ao carrinho!">
</form>
        
    </div>

    <div id="primeiroretangulopequeno"> </div>

    <div id="segundoretangulopequeno"> </div>

    <div id="terceiroretangulopequeno"> </div>

    

    </div>

            </div>
</body>
</html>