<?php
require_once "../verifica_logado.php";
if(!$logado){
 header('location:../login.php');
}
?>
<?php
$nome = $_POST['nomemarca'];
$id = $_POST['id'];

try{
require_once("../conexaobd.php");
$sql = $conexao->prepare("UPDATE marca SET nomemarca ='". $nome."' WHERE idmarca = ".$id);
$sql->execute();

if($sql->rowCount()>0){
    ?>
        <script>
            alert("Marca atualizada!!!\n\n :)");
            window.close();
        </script>
    <?php
    //echo"<a><button onclick='window.close()'> Voltar</button> </a>";
}else{
    ?>
        <script>
            alert("Nenhuma alteração feita!!!");
            window.close();
        </script>
    <?php
}
}catch( Exception $e){
    print "Error!: ".$e->getMessage(). "<br>";
    sleep(4);
    ?>
    <script>
            alert("Pode ser que tenha dado erro....");
            window.close();
        </script>
    <?php
    
}
?>