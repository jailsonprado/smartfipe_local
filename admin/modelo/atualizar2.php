<?php
require_once "../verifica_logado.php";
if(!$logado){
 header('location:../login.php');
}
?>
<?php
$idmodelo = $_POST['idmodelo'];
$idmarcas =$_POST['marca'];
$modelo  = $_POST['nomemodelo'];
$mai_preco = $_POST['mai_preco'];
$men_preco = $_POST['men_preco'];

/*Subistitui o ponto por "" (nada)*/
$men_preco = str_replace(".","", $men_preco) ;
$mai_preco =str_replace(".","",$mai_preco);
/*Subistitui o "," por "."*/
$men_preco = str_replace(",",".", $men_preco) ;
$mai_preco = str_replace(",",".",$mai_preco);

$media = ($men_preco + $mai_preco)/2;

require_once("../conexaobd.php");
$sql = $conexao->prepare("UPDATE modelo SET nomemodelo ='". strtolower($modelo)."',idmarca = $idmarcas,menor_preco = $men_preco,maior_preco = $mai_preco, media = '$media' WHERE idmodelo = ".$idmodelo);
$sql->execute();

if($sql->rowCount()>0){
    ?>
    <script>
        alert("item atualizado!!!");
        window.close();
        
    </script>
    <?php
}else{
    echo "Volte e coloque a marca!!!";
}
?>
