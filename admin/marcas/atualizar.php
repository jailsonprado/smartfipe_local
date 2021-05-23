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
                   <form action="atualizar2.php" method="post">
                    <?php
                    
                    require_once("../conexaobd.php");

                         
                         if(!isset($_GET['id'])){
                             echo "Nada selecionado";
                         }else{
                             $sql = $conexao->prepare("SELECT * FROM marca WHERE idmarca = ".$_GET['id']);
                             $sql->execute();
                             $res =  $sql->fetchAll(PDO::FETCH_ASSOC);
                             foreach($res as $result){
                            

                       ?>
                       <input type="hidden" name="id" value=<?php echo $result["idmarca"];?>>
                       <input class="form-control" type="text" name="nomemarca" id="nomemarca" value="<?php echo strtoupper($result["nomemarca"]);}}?>">
                       <input type="submit" class="btn btn-primary" value="Atualizar">
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
</body>
</html>