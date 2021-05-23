<?php
require_once "../verifica_logado.php";
if(!$logado){
 header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--Style me-->
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/scripts.js"></script>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <!--mascaras-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>   
    <script>
         $(document).ready(function(){
            $('.menor').mask("#.##0,00", {reverse: true});
            $('.maior').mask("#.##0,00", {reverse: true});
        
        });
    </script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin Console</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick='window.close()'>Fechar janela</a>
                  </li>
              </ul>
            </div>
          </nav>
    </header>

    <main>
      <!--cadastro-->
        <div class="container">
            <div class="col-md-12">
                <div class="cadma">
                    <form class="form-group" action="" method="POST">
                            <input class="form-control" type="text" name="nomemodelo" id="form_input" placeholder="Digite o nome do modelo...">
                            <select class="form-select form-control" aria-label=".form-select-sm example" name="marca" id="form_input">
                                <option value="" selected>Selecione a Marca</option>
                                <?php
                                    require_once("../conexaobd.php");
                                    $sql = $conexao->prepare("SELECT*FROM marca order by nomemarca");
                                    $sql->execute();
                                    $retorno = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($retorno as $res){
                                ?>
                                <option  value=<?php echo $res["idmarca"]; ?>><?php echo strtoupper($res["nomemarca"]);}?></option>
                          
                        </select>
                            <input class="form-control menor" type="text" name="men_preco" id="form_input" placeholder="Menor preço...">
                            <input class="form-control maior" type="text" name="mai_preco" id="form_input" placeholder="Maior preço...">
                            <input  class="btn btn-primary bott" type="submit" value="Cadastrar" onclick="check()">
                    </form>
                        <?php
                            require_once("../conexaobd.php");
                            require_once ('../anti_injection.php');

                           if(!isset($_POST['nomemodelo'])){ //a varialvel por enquanto esta vindo null, vericar depois
                                echo "Insira o nome do modelo!!!";
                            }else{
                            $marcas =$_POST['marca'];
                            $modelo  = anti_injection($_POST['nomemodelo']);
                            $mai_preco = $_POST['mai_preco'];
                            $men_preco = $_POST['men_preco'];
                            $marca = strtolower($modelo);
                            //verifica se a marca existe
                            $sql = $conexao->prepare("SELECT*FROM modelo WHERE nomemodelo= '".$modelo."'");
                            $sql->execute();
                            $rows = $sql->rowCount();
                            if($rows>0){ //existe, não? pula para o else
                                ?>
                                    <script>
                                        alert("Essse modelo ja existe!!!");
                                    </script>
                                <?php
                            }else{
                                /*Subistitui o ponto por "" (nada)*/
                                $men_preco = str_replace(".","", $men_preco) ;
                                $mai_preco =str_replace(".","",$mai_preco);
                                /*Subistitui o "," por "."*/
                                $men_preco = str_replace(",",".", $men_preco) ;
                                $mai_preco = str_replace(",",".",$mai_preco);
                                if($men_preco > $mai_preco){
                                    echo "<script> alert('Verifique os campos de preço!!!!') </script>";
                                }else{
                                $media = ($mai_preco + $men_preco)/2;
                                $insere = $conexao->prepare("INSERT INTO modelo values(NULL,$marcas,'".strtolower($modelo)."','".$men_preco."','".$mai_preco."',$media)");
                                $insere->execute();
                                
                                $insere->rowCount()==1 ? "<p class='sucess'>Modelo cadastrado </p>": "<p class='fail'>Falha ao cadastrar!!!</p>";
                               }               
                            }
                        }
                        ?>
                </div>
           </div>

        </div>
    </main>
    
<!--SCRIP-->
<script >
    function check(){
        let marca = getElementById('nomemodelo');
        if(marca==""){
            alert("Favor inserir um valor");

        }
    }
    
</script>

<footer>
        
</footer>
    <!--Bootstrap popper+js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!--Fontawesome <icones>-->
    <script src="https://kit.fontawesome.com/3e9e6ed07b.js" crossorigin="anonymous"></script>
</body>
</html>