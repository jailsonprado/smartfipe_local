<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script data-ad-client="ca-pub-9739130167799074" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link rel="icon" href="./smartfipe/img/sgv.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="imagens/favicon.png">
    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="./smartfipe/css/estilohome.css">
    <title>SmartFipe</title>
    

<body>
    <header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top nav-trans">
                <div class="container">
                    <a class="navbar-brand" href="index.php">SmartFipe</a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                     <i class="fas fa-bars text-white"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="informacao.html" class="nav-link">Informações</a>
                            </li>
                            <li class="nav-item">
                                <a href="contato.html" class="nav-link">Contato</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
  
    
   <div>
   <section id="carroca">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner .d-none .d-md-block .d-lg-none">
    <div class="carousel-item active">
    <img src="./smartfipe/img/capa.png" class="img-fluid w-100" >
    </div>
    </section>
   </div>

    

    <section id="container">
        <div id="marcas">
            <h2>Fabricante:</h2>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="marca" id="marca">
                <option value="" selected>Nada selecionado</option>
                <?php
                    require_once("./conexaobd.php");
                    $sql = $conexao->prepare("SELECT*FROM marca order by nomemarca");
                    $sql->execute();
                    $retorno = $sql->fetchAll(PDO::FETCH_ASSOC);
                    foreach($retorno as $res){
                ?>
                <option value=<?php echo $res["idmarca"]; ?>>
                    <?php echo strtoupper($res["nomemarca"]);?>
                </option>
                <?php }?>
                <!-- Fim PHP marca -->
            </select>
        </div>

        <div id="modelos">
            <h2>Modelo:</h2>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="modelo" id="modelo">
                <option  value="">Nada selecionado</option>

            </select>
            <div style="margin-top: 8px;">
                <h2 id="sub" class="text-white">Sugestões de preços para venda de Smartphones*</h2>
            </div>
        </div>
        <div id="mostrar" class="container-fluid">
                    
        </div>
    </section>
          
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a class="navbar-brand" href="index.php">SmartFipe</a>
                </div>
                <div class="col-md-2">
                    <h4>Informações
                        gerais
                    </h4>
                    <ul class="navbar-nav">
                        <li><a href="termos.html">Termos
                                de
                                uso</a>
                        </li>
                        <li><a href="privacidade.html">Politicas
                                de
                                privacidade</a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-2">
                    <h4>links
                        uteis
                    </h4>
                    <ul class="navbar-nav">
                        <li><a href="contato.html">Contato</a>
                        </li>
                        <li><a href="informacao.html">Info</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <a href=""><img src="./smartfipe/img/facebook.png"></a>
                        </li>
                        <li>
                            <a href=""><img src="./smartfipe/img/twitter.png"></a>
                        </li>
                        <li>
                            <a href=""><img src="./smartfipe/img/instagram.png"></a>
                        </li>
                        <!--- Secure Site Seal - DO NOT EDIT --->
                        <span id="ss_img_wrapper_115-55_image_en">
                            <a href="http://www.alphassl.com/ssl-certificates/wildcard-ssl.html" target="_blank"
                                title="SSL Certificates">
                                <img alt="Wildcard SSL Certificates" border=0 id="ss_img"
                                    src="//seal.alphassl.com/SiteSeal/images/alpha_noscript_115-55_en.gif"
                                    title="SSL Certificate">
                            </a>
                        </span>
                        <script type="text/javascript"
                            src="//seal.alphassl.com/SiteSeal/alpha_image_115-55_en.js"></script>
                        <!--- Secure Site Seal - DO NOT EDIT --->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
                   
    <!-- <script type="text/javascript" src="js/script.js"></script>-->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!--API Google JS para atualizar os selects-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <!--
<script type="text/javascript">

google.load("jquery", "1.4.2");

</script>
-->
    <script>
        //envia o valor selecionado para o php retornar a Query com o resultado e preenche o select
        $("#marca").change(function () {
            var marca = $(this).val();
            //console.log(marca);
            $.ajax({
                url: "./modelo.php?idmarca =" + marca,
                type: "GET",
                data: { 'idmarca': marca },
                dataType: 'text',
                success: function (res) {
                    $("#modelo").append(res);
                },
                beforeSend: function () {
                    $("#modelo").css({ textalign: 'center', width: '155px' });
                    $("#modelo").html("carregando...");
                },
                success: function (data) {
                    $("#modelo").css({
                        textalign: 'center',
                        margintop: '50px',
                        paddingtop: '30px'
                    }); //preenche o select
                    $('#modelo').html(data);
                },
                error: function () {
                    $('#modelo').css({ 'display': 'block' });
                    $('#modelo').html("Houve um problema");
                }

            });

        });
         //ao precionar o modelo ver valor os valores são carregados
        $("#modelo").click(function () {
            var modelo = $('#modelo').val();
            //console.log(modelo);

            $.ajax({
                url: "./modelo.php?idmodelo="+modelo,
                type: "GET",
                data: { 'idmodelo': modelo },
                dataType: 'text',
                success: function (res) {
                    $("#mostrar").append(res);
                },
                beforeSend: function () {
                    $("#mostrar").css({ textalign: 'center', width: '155px' });
                    $("#mostrar").html("carregando...");
                },
                success: function (data) {
                    $("#mostrar").css({
                       
                    }); //preenche o label
                    $("#mostrar").html(data);
                },
                error: function () {
                    $("#mostrar").css({ 'display': 'block' });
                    $("#mostrar").html("Houve um problema");
                }

            });

        });

    </script>
</body>

</html>