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
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="estiloTelaInicialOriginal.css"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

    <div class="row" id="tela_inteira">
        <div class="col-2 text-center" style="background-color: #1A2327;">
        <a href="telaInicial_Backup.php?filtro1=1"><img src="imagens/logo.png" width="70%"  alt="sem foto"></a>


                <img id="foto_perfil" src="imagens/foto_perfil.png" class="rounded-circle mt-5"  alt="sem foto">
    <?php

            include("listar_usuario_conectado.php");

            echo"<p style='color: #9A9A9D'> ".$info_usuarios['usuario_nome']."</p>";

    ?>
                <a href="telaCompra.php"> <div class="text-center" style="border-radius: 10px;width: 10%; height: 50px; position: absolute; top: 93%; left: 3.8%; color: white; background-color: #13191C; "> <p style="margin: 0px; position: absolute; left: 27.8%; top: 22%;"> Ver Carrinho </p> </div> </a>

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
        
        <div class="col-10 mx-0" style="background-color: #253239;">
            <div class="row justify-content-center" id="area_util">
                <div class="text-center py-3" id="barra_navegacao" >



                <select id="arma" class="text-center form-select mx-auto fs-6 fw-bold mt-5 " aria-label="Default select example" style="position: absolute; left: 30%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none;" onchange="Filtrar();">
                    <option disabled selected> Armas </option>
                    <option value="ak47"> AK-47 </option>
                    <option value="usps"> USP-S </option>
                    <option value="m4a4"> M4A4 </option>
                    <option value="m4a1-s"> M4A1-S </option>
                    <option value="awp"> AWP </option>
                    <option value="famas"> Famas </option>
                    <option value="galil"> Galil AR </option>
                    <option value="aug"> AUG </option>
                </select>


                

                <select id="faca" class="text-center form-select mx-auto fs-6 fw-bold mt-5" aria-label="Default select example" style="position: absolute; left: 42%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none;" onchange="Filtrar2();">
                    <option disabled selected> Facas </option>
                    <option value="karambit"> Karambit </option>
                    <option value="butterfly"> Butterfly </option>
                    <option value="baioneta"> M9 Baioneta </option>
                    <option value="flipknife"> Flip Knife </option>
                    <option value="shadowdaggers"> Shadow Daggers </option>
                    <option value="talonknife"> Talon Knife </option>
                    <option value="ursusknife"> Ursus Knife </option>
                </select>

                <select id="luva" class="text-center form-select mx-auto fs-6 fw-bold mt-5" aria-label="Default select example" style="position: absolute; left: 54%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none;" onchange="Filtrar3();">
                    <option disabled selected> Luvas </option>
                    <option value="luvas_esportivas"> Luvas Esportivas </option>
                    <option value="faixas"> Faixas </option>
                    <option value="luvas_de_motociclismo"> Luvas de Motociclismo </option>
                    <option value="luvas_de_especialista"> Luvas de Especialista </option>
                    <option value="luvas_de_motorista"> Luvas de Motorista </option>
                    <option value="luvas_da_hidra"> Luvas da Hidra </option>
                    <option value="luvas_do_cao_de_caca"> Luvas do Cão de Caça </option>
                    <option value="luvas_da_presa_quebrada"> Luvas da Presa Quebrada </option>
                </select>


                </div>


                



                <div class="input-group m-5 w-50 mb-3">
                    <input id="barra_pesquisa" type="text" class="form-control text-center text-light"  style="background:#1A2327; " placeholder="Busque aqui o item perfeito para destruir nos games!" aria-label="" aria-describedby="button-addon2">
                    <button id="barra_pesquisa_botao" class="btn btn-outline-secondary" style="background:#1A2327;" onclick="Pesquisar();" type="button" >Pesquisar</button>
                  </div>

                
            <div class="container text-center" style="margin-top: 120px; margin-left: 180px;">

 
                <div class="row row-cols-5" style="width: 90%; margin: 0px; margin-top: -100px;">


                <?php 
                include("filtrarItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            ?>
                           <a style="text-decoration: none; margin-bottom: 24px;" href="telaDoItem.php?id_item=<?php echo $linha['id_item'];?>"> 
                                <div class="col" id="quadrado">
                                    <div class="text-center"style="position: absolute; width: 13%; height: 170px; margin-top: 10px; margin-right: 5px; margin-left: 5px; border-radius: 10px;color: white;"> 
                                        <?php echo $linha['nome_item'];?>
                                    </div> 
                                    <br> 
                                    <?php echo '<img style="border-radius: 10px;" width="100%" src="'.$linha['foto'].'">';?>
                                </div>
                            </a>



            <?php
                    }
                }
            ?>    
          

                </div>
            </div>
            </div>


        </div>
 
    </div>

 

</body>

<script>
    function Filtrar()
    {
        var filtro1 = arma.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

    function Filtrar2()
    {
        var filtro1 = faca.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

    function Filtrar3()
    {
        var filtro1 = luva.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }


    function Pesquisar()
    {
        var filtro1 = barra_pesquisa.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

</script>
</html>