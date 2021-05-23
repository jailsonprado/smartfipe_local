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
            $('.menor').mask("#.##0,00", {reverse: false});
            $('.maior').mask("#.##0,00", {reverse: false});
            $('.media').mask("#.##0,00", {reverse: false});
        
        });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
</head>
<body onunload="window.opener.location.reload();">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin Console</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                  <a class="nav-link" href="../index.php">Home</a>
                  <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>

    <main>
      <!--marcas-->
        <div class="container">
            <div class="marca">
             <button class="btn btnmarca" onclick="window.open('//localhost/smartfipe_local/admin/modelo/cadastromodelo.php','popup', 'width=900,height=500,top=100,left=240,scrollbars=no, status=no, toolbar=no, location=no, menubar=no, resizable=no, fullscreen=no')"><i class="fas fa-plus-circle iconmarca"></i>Novo Modelo</button>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                  <!--Cabeçalho da tabela-->
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Modelo</th>
                    <th scope="col">Nome da Marca</th>
                    <th scope="col">Maior Preço</th>
                    <th scope="col">Menor Preco</th>
                    <th scope="col">Preço Medio</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                  </tr>
              </thead>
              
              <!--Corpo da tabela-->
              <tbody>
                  
                  <?php
                        include_once("../conexaobd.php");
                      $sql = $conexao->prepare("SELECT*FROM modelo,marca WHERE marca.idmarca = modelo.idmarca ORDER BY modelo.idmodelo ");
                      $sql->execute();

                      $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                      foreach($result as $info){
                        
                      ?>
                      <tr>
                        <th scope='row'><?php echo $info['idmodelo'];?></th>
                        <td> <?php echo strtoupper($info['nomemodelo']);?></td>
                        <td> <?php echo strtoupper($info['nomemarca']);?></td>
                        <td class="menor"><span>R$</span><?php echo $info['menor_preco'];?></td>
                        <td class="maior"><span>R$</span><?php echo $info['maior_preco'];?></td>
                        <td class="media"><span>R$</span><?php echo $info['media']; ?></td>

                        <td><button class='btn' onclick='window.open("//localhost/smartfipe_local/admin/modelo/atualizar.php?id=<?php echo $info['idmodelo'];?>","popup", "width=900,height=500,top=100,left=240,scrollbars=no, status=no, toolbar=no, location=no, menubar=no, resizable=no, fullscreen=no")'><i class='fas fa-edit' id="edit"></i></button></td>
                        <td> <a><button class='btn ' onclick='window.open("//localhost/smartfipe_local/admin/modelo/delete.php?id=<?php echo $info['idmodelo'];?>","popup", "width=900,height=500,top=100,left=240,scrollbars=no, status=no, toolbar=no, location=no, menubar=no, resizable=no, fullscreen=no")'><i class='fas fa-trash-alt' id="del"></i></button></a></td>
                        </tr>
                     <?php }?>
              </tbody>
          </table>
      </div>
    </main>


    <footer>
        
    </footer>
<!--Bootstrap popper+js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Fontawesome <icones>-->
<script src="https://kit.fontawesome.com/3e9e6ed07b.js" crossorigin="anonymous"></script>

</body>
</html

