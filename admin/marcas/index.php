<?php
/*require_once "../verifica_logado.php";
if(!$logado){
 header('location:../login.php');
}*/
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
    <title>Adimnistrar Marcas</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Adiministrar Marcas</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
              </ul>
            </div>
          </nav>
    </header>

    <main>
      <!--marcas-->
        <div class="container-fluid">
            <div class="marca">
             <!--<button class="btn btnmarca" onclick="window.open('//localhost/smartfipe_local/admin/marcas/cadastromarca.php','popup', 'width=900,height=500,top=100,left=240,scrollbars=no, status=no, toolbar=no, location=no, menubar=no, resizable=no, fullscreen=no')"><i class="fas fa-plus-circle iconmarca"></i>Nova Marca</button>-->
             <button type="button" id="btn-cad" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadastro">
               Cadastrar
            </button>
            </div>
           
            <table class="table table-striped table-hover">
                <thead>
                  <!--Cabeçalho da tabela-->
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                  </tr>
              </thead>
              
              <!--Corpo da tabela-->
              <tbody>
                  
                  <?php
                        include_once("../conexaobd.php");
                      $sql = $conexao->prepare("SELECT*FROM marca");
                      $sql->execute();

                      $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                      foreach($result as $info){
                        
                      ?>
                      <tr>
                        <th scope='row'><?php echo $info['idmarca'];?></th>
                        <td> <?php echo strtoupper($info['nomemarca']);?></td>
                        <!--onclick='window.open("//localhost/smartfipe_local/admin/marcas/atualizar.php?id=<?php echo $info['idmarca'];?>","popup", "width=900,height=500,top=100,left=240,scrollbars=no, status=no, toolbar=no, location=no, menubar=no, resizable=no, fullscreen=no")'-->
                        <td><button class='btn' id='attmarca' value="<?php echo $info['idmarca'];?>" data-bs-toggle="modal" data-bs-target="#update"><i class='fas fa-edit' id="edit"></i></button></td>
                        <td> <a><button class='btn ' onclick='window.open("//localhost/smartfipe_local/admin/marcas/delete.php?id=<?php echo $info['idmarca'];?>","popup", "width=900,height=500,top=100,left=240,scrollbars=no, status=no, toolbar=no, location=no, menubar=no, resizable=no, fullscreen=no")'><i class='fas fa-trash-alt' id="del"></i></button></a></td>
                        </tr>
                     <?php }?>
              </tbody>
          </table>
      </div>
    </main>
    <section> <!--sessao modals-->
                         <!-- Modal Cadastrar-->
            <div class="modal fade" id="cadastro" tabindex="-1" aria-labelledby="Modal de Cadastro" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body modal-maior">
                                <div class="formu">
                                  <form action="" method="Post" class="form-group" id="myform">
                                      <input class="form-control" type="text" name="marca" id="marca" placeholder="Digite o nome da marca">
                                      
                                    </form>
                                  </div>
                                
                            </div>
                            <div class="modal-footer">
                            <input  type="submit" class="btn btn-outline-success" id="cad" name="cadastrar" value="cadastrar" data-bs-dismiss="modal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal alterar-->
        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alterar Marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body modal-maior">
                                <div class="formu">
                                  <form action="" method="POST" class="form-group" id="myform">
                                      <input class="form-control" type="text" name="marca" id="marca" placeholder="Digite o nome da marca">
                                      
                                    </form>
                                  </div>
                                
                            </div>
                            <div class="modal-footer">
                            
                            <input  type="submit" class="btn btn-outline-success" id="att" name="alterar" value="Alterar" data-bs-dismiss="modal">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer>
        
    </footer>
<!--Jquery-->
<script  src = "https://code.jquery.com/jquery-3.5.1.js"> </script> 
<!--Bootstrap popper+js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Fontawesome <icones>-->
<script src="https://kit.fontawesome.com/3e9e6ed07b.js" crossorigin="anonymous"></script>
<script>
  //cadastrar
  $("#cad").click(function () {
          
          var marca = $('#marca').val();
          $.ajax({
                url: "cadastromarca.php",
                type: "POST",
                data: { 'nomemarca': marca
                        
                      },
                dataType: 'text',

                success: function (data) {
                    //preenche o label
                    console.log(data);

                    if(data){
                      alert(data);
                    }else{
                      alert(data);
                    }
                   
                },
                error: function () {
                  alert('Um erro foi encontrado!!!');
                    
                }
                
            });
            // $("#myform")[0].reset();
        });
        //atualizar
        $("#att").click(function () {
          
          var id = $('#attmarca').val();
          console.log(id);
          
          $.ajax({
                url: "atualizar2.php",
                type: "POST",
                data: { 'id': id
                        
                        
                      },
                dataType: 'text',

                beforeSend: function () {
                    $("#result").css({ textalign: 'center', width: '155px' });
                    $("#result").html("carregando...");
                },
                success: function (data) {
                   //preenche o label
                    if(data){
                      alert('Cadastro atualizado com Sucesso!!!');
                    }else{
                      alert('Um erro foi encontrado!!!');
                    }
                   
                    
                },
                error: function () {
                    $("#result").css({ 'display': 'block' });
                    $("#result").html("Houve um problema");
                    
                }
                
            });
           
        });


</script>
</body>
</html

