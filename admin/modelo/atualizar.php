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
                  <form action="atualizar2.php" method="POST">
                  <?php
                   include_once("../conexaobd.php");
                   $sql = $conexao->prepare("SELECT*FROM modelo WHERE idmodelo =".$_GET['id']);
                   $sql->execute();

                   $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                   foreach($result as $res){
  
                  ?>
                  <input type="hidden" name="idmarca" value = <?php echo $res['idmarca'];?>>
                  <input type="hidden" name="idmodelo" value = <?php echo $res['idmodelo'];?>>

                <input class="form-control" type="text" name="nomemodelo" id="form_input" placeholder="Digite o nome do modelo..." value="<?php $nome = strtoupper($res["nomemodelo"]);}; echo $nome; ?>">
                      <select class="form-select form-control" aria-label=".form-select-sm example" name="marca" id="form_input1">

                           <option value="0" selected>Selecione a Marca</option>
                           <?php
                                    require_once("../conexaobd.php");
                                    $sql = $conexao->prepare("SELECT*FROM marca");
                                    $sql->execute();
                                    $retorno = $sql->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($retorno as $marca){
                          ?>
                          <option  value=<?php echo $marca["idmarca"]; ?>><?php echo strtoupper($marca["nomemarca"]);} $marca = "";?></option>
                          
                      </select>
                            <input class="form-control menor" type="text" name="men_preco" id="form_input" placeholder="Menor preço..." value = <?php echo $res["menor_preco"]; ?>>
                            <input class="form-control maior" type="text" name="mai_preco" id="form_input" placeholder="Maior preço..." value = <?php echo $res["maior_preco"]; ?>>
                            <input  class="btn btn-primary bott" type="submit" value="Atualizar" onmouseenter = "check()"> 
                    </form>
                </div>
           </div>

        </div>
    </main>
    


    <footer>
        
    </footer>
<!--Bootstrap popper+js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Fontawesome <icones>-->
<script src="https://kit.fontawesome.com/3e9e6ed07b.js" crossorigin="anonymous"></script>
<!--SCRIP-->
<script>  
    function check(){
      let modelo = document.getElementById('form_input1');
      console.log(modelo.value);
      if(modelo.value==0){
        alert("\n⚠️SELECIONE A MARCA!!!!⚠️");
      }
    }
</script>
</body>
</html>