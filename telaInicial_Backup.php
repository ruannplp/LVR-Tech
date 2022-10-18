<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="estiloTelaInicial - Copia.css"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
    <div class="row" id="tela_inteira">
        <div class="col-2 text-center" style="background-color: #1A2327;">
                <img id="foto_perfil" src="imagens/foto_perfil.png" class="rounded-circle mt-5"  alt="sem foto">
                <h5 class="h5    mt-2" style="color: #9A9A9D">Iniciar Sessão</h5>

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

                    <a href="telaCSGO.html" style="text-decoration: none;">
                    <img id="imagem" src="imagens/csgo.png">
                    </a>

                    <a href="telaLOL.html" style="text-decoration: none;">
                    <img id="imagem" src="imagens/league_of_legends.png">
                    </a>
                    
                    <img id="imagem" src="imagens/dota2.png">
                 
                    <img id="imagem" src="imagens/valorant.png">
                 
                    <img id="imagem" src="imagens/rocket_league.png">
                </div>



                <div class="input-group m-5 w-50 mb-3">
                    <input id="barra_pesquisa" type="text" class="form-control text-center text-light"  style="background:#1A2327; " placeholder="Busque aqui o item perfeito para destruir nos games!" aria-label="" aria-describedby="button-addon2">
                    <button id="barra_pesquisa_botao" class="btn btn-outline-secondary" style="background:#1A2327;; " type="button" id="button-addon2">Pesquisar</button>
                  </div>

                
            <div class="container text-center" style="margin-top: 120px; margin-left: 180px;">


                <div class="row row-cols-5" style="width: 90%; margin: 0px; margin-top: -100px;">


                <?php 
                include("listarItem.php");

                if (!empty($listaItens)) {
                    foreach($listaItens as $linha) { 
            ?>
                            <div class="col" id="quadrado">    <?php echo $linha['nome_item'];?> <br> <?php echo '<img height="100%" width="100%" src="'.$linha['foto'].'">';?>   </div>



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
</html>