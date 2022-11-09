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
        <div class="col-2 text-center" style="background-color: #1A2327;     box-shadow: inset -2px -2px 100px 0px #0E1316;">
        <a href="telaInicial_Backup.php?filtro1=1"><img src="imagens/logo.png" width="70%"  alt="sem foto"></a>



<a style="text-decoration: none;" href="telaPerfil.php">


    <?php

            include("listar_usuario_conectado.php");

            echo '<img style="height: 120px; width: 120px; border-radius: 50%; margin-top: 8%;" class="mt-3"  src="'.$info_usuarios['foto'].'"  alt="imagens/foto_perfil.png">';

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


            

                <select id="filtro_preco" class="text-center form-select w-75 mx-auto fs-6 fw-bold mt-5 " aria-label="Default select example" onchange="FiltrarPreco()" style="background-color: #13191C; color: #9A9A9D; border-style: none;">
                        <option disabled selected>Ordenar por</option>
                        <option value="asc">Mais Barato</option>
                        <option value="desc">Mais Caro</option>
                        <option value="1">Novidades</option>
                </select>






        </div>
        
        <div class="col-10 mx-0" style="background-color: #13191D;">
            <div class="row justify-content-center" id="area_util">
                <div class="text-center py-3" id="barra_navegacao" >



                <select id="arma" class="text-center form-select mx-auto fs-6 fw-bold mt-5 " aria-label="Default select example" style="position: absolute; left: 30%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none; border-color: #2907B2; border-style: solid;" onchange="FiltrarRifle();">
                    <option disabled selected> Rifles e SMGs </option>
                    <optgroup label="Rifles">
                    <option value="ak-47"> AK-47 </option>
                    <option value="m4a4"> M4A4 </option>
                    <option value="m4a1-s"> M4A1-S </option>
                    <option value="famas"> Famas </option>
                    <option value="galil"> Galil AR </option>
                    <option value="aug"> AUG </option>
                    <option value="ssg"> SSG 08 </option>
                    <option value="awp"> AWP </option>
                    <option value="g3sg1"> G3SG1 </option>
                    <option value="scar-20"> SCAR-20 </option>
                    <option value="sg53"> SG 553 </option>
                    </optgroup>
                    <optgroup label="SMGs">
                    <option value="ump45"> UMP-45 </option>
                    <option value="mac10"> MAC-10 </option>
                    <option value="mp7"> MP7 </option>
                    <option value="mp9"> MP9 </option>
                    <option value="ppbizon"> PP-Bizon </option>
                    <option value="mp5sd"> MP5-SD </option>
                    </optgroup>
                </select>

                <select id="pesadas" class="text-center form-select mx-auto fs-6 fw-bold mt-5" aria-label="Default select example" style="position: absolute; left: 42%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none;  border-color: #2907B2; border-style: solid;   " onchange="FiltrarPesadas();">
                    <option disabled selected> Pesadas </option>
                    <option value="xm1014"> XM1014 </option>
                    <option value="mag7"> MAG-7 </option>
                    <option value="nova"> Nova </option>
                    <option value="negev"> Negev </option>
                    <option value="m249"> M249 </option>
                </select>


                

                <select id="faca" class="text-center form-select mx-auto fs-6 fw-bold mt-5" aria-label="Default select example" style="position: absolute; left: 66%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none;  border-color: #2907B2; border-style: solid;" onchange="FiltrarFaca();">
                    <option disabled selected> Facas </option>
                    <option value="adagas_sombrias"> Adagas Sombrias </option>
                    <option value="bowie"> Bowie </option>
                    <option value="canivete_flip"> Canivete Flip </option>
                    <option value="butterfly"> Butterfly </option>
                    <option value="canivete_falchion"> Canivete Falchion </option>
                    <option value="faca_cacador"> Faca Caçador </option>
                    <option value="faca_gut"> Faca Gut </option>
                    <option value="karambit"> Karambit </option>
                    <option value="m9_baioneta"> M9 Baioneta </option>
                    <option value="baioneta"> Baioneta </option>
                    <option value="faca_ursus"> Faca Ursus </option>
                    <option value="faca_talon"> Faca Talon </option>
                    <option value="faca_navaja"> Faca Navaja </option>
                    <option value="faca_stiletto"> Faca Stiletto </option>
                    <option value="faca_de_sobrevivencia"> Faca de Sobrevivência </option>
                    <option value="faca_de_cordame"> Faca de Cordame </option>
                    <option value="faca_nomade"> Faca Nômade </option>
                    <option value="faca_classica"> Faca Clássica </option>
                    <option value="faca_esqueleto"> Faca Esqueleto </option>
                </select>

                <select id="luva" class="text-center form-select mx-auto fs-6 fw-bold mt-5" aria-label="Default select example" style="position: absolute; left: 78%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none;  border-color: #2907B2; border-style: solid;   " onchange="FiltrarLuva();">
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

                <select id="pistolas" class="text-center form-select mx-auto fs-6 fw-bold mt-5" aria-label="Default select example" style="position: absolute; left: 54%; top: -3.4%; background-color: #13191C; color: #9A9A9D; width: 10%; border-style: none;  border-color: #2907B2; border-style: solid;   " onchange="FiltrarPistolas();">
                    <option disabled selected> Pistolas </option>
                    <option value="usps"> USP-S </option>
                    <option value="glock18"> Glock-18 </option>
                    <option value="five_seven"> Five-Seven </option>
                    <option value="p2000"> P2000 </option>
                    <option value="P250"> P250 </option>
                    <option value="tec9"> Tec-9 </option>
                    <option value="cz75_auto"> CZ75-Auto </option>
                    <option value="desert_eagle"> Desert Eagle </option>
                    <option value="r8_revolver"> R8 Revolver </option>
                    <option value="dual_berettas"> Dual Berettas </option>
                </select>





                </div>


                



                <div class="input-group m-5 w-50 mb-3">
                    <input id="barra_pesquisa" type="text" class="form-control text-center text-light"  style="background:#1A2327; " placeholder="Busque aqui o item perfeito para destruir nos games!" aria-label="" aria-describedby="button-addon2">
                    <button id="barra_pesquisa_botao" class="btn" style="background:#1A2327;" onclick="Pesquisar();" type="button" >Pesquisar</button>
                  </div>

                
            <div class="container text-center" style="margin-top: 120px; margin-left: 180px;">

 
                <div class="row row-cols-5" style="width: 90%; margin: 0px; margin-top: -100px;">


                <?php 
                include("filtrarItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            ?>
                           <a style="text-decoration: none; margin-bottom: 6px; margin-left: 0px; margin-right: 0px;"  href="telaDoItem.php?id_item=<?php echo $linha['id_item'];?>"> 
                           <div class="container">
                                <div class="col card" style="width: 120%; height: 250px; margin-left: -25%;" id="quadrado">

                                <br> 
                                    <?php echo '<img style="border-radius: 10px; margin: 0px; class="shadow-inset-lg" width="100%" src="'.$linha['foto'].'">';?>
                                    <br>
                                    <div class="text-center content"style="position: absolute; border-radius: 10px;color: white; "> 
                                        <?php echo"<p style='font-size: 16px; margin-top: -20%;'>".$linha['nome_item']."</p>";?>

                                        <?php echo"<p style='font-size: 13px; margin-top: -15%;'> R$".$linha['valor']."</p>";?>
                                    </div> 
                                </div>
                    </div>
                            </a>



            <?php
                    }
                }
            ?>    

            </div>


            </div>
 


 

</body>

<script>
    function FiltrarRifle()
    {
        var filtro1 = arma.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

    function FiltrarFaca()
    {
        var filtro1 = faca.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

    function FiltrarPesadas()
    {
        var filtro1 = pesadas.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

    function FiltrarLuva()
    {
        var filtro1 = luva.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

    function FiltrarPistolas()
    {
        var filtro1 = pistolas.value;

        var url = "telaInicial_Backup.php?filtro1=" + filtro1;
        
        window.open(url,"_self");
    }

    function FiltrarPreco()
    {

        var filtro1 = filtro_preco.value;

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