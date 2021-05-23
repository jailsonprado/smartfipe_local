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
                    <form class="form-group" action="" method="POST">
                            <input class="form-control" type="text" name="nomemarca" id="nomemarca" placeholder="Digite o nome da marca...">
                            <input  class="btn btn-primary bott" type="submit" value="Cadastrar" onclick="check()">
                    </form>
                        <?php
                            require_once("../conexaobd.php");
                            require_once "../anti_injection.php";

                           if(!isset($_POST['nomemarca'])){ //a varialvel por enquanto esta vindo null, vericar depois
                                echo "Insira o nome da marca!!!";
                            }else{
                            $marca = anti_injection($_POST['nomemarca']); //remover caracteres especiais  () */ from, droptable select e etc
                            $marca = strtolower($marca);
                            //verifica se a marca existe
                            $sql = $conexao->prepare("SELECT nomemarca FROM marca WHERE nomemarca= '".$marca."'");
                            $sql->execute();
                            $rows = $sql->rowCount();
                            if($rows>0){ //existe, não? pula para o else
                                echo "<p class='fail'>Essa marca ja existe!!!</p>";
                            }else{
                                try{
                                $insere = $conexao->prepare("INSERT INTO marca values(NULL,'".$marca."')");
                                $insere->execute();

                                if($insere->rowCount()>0){
                                    ?>
                                        <script>
                                            alert("Marca cadastrada!!!\nClique em qualquer botão para fechar");
                                            window.close();
                                        </script>
                                    <?php
                                }else{
                                    ?>
                                    <script>
                                        alert("Error!!!\nContate o administrador....");
                                        window.close();
                                    </script>
                                <?php
                                }
                            }catch(Exception $e){
                                echo "Error: ".$e->getMessage()."</br>";
                            }
                                
                            
                            }
                        }
                        ?>
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
        let marca = getElementById('nomemarca');
        if(marca==""){
            alert("Favor inserir um valor");

        }
    }
    
</script>

</body>
</html>