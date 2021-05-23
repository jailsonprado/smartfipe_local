
<?php
 /* session_start();

 echo$_SESSION['login'];
 echo "<br>";
  echo $_SESSION['pass'];
*/
try{
  require_once "conexaobd.php";
  $senha =password_hash("teste",PASSWORD_DEFAULT);
  
  //$sql = $conexao->prepare("insert into user values(null,'walison miranda2','walison','$senha',1)");
  //$sql->execute();
  
  if($sql->rowCount()){
    echo "<p>Inseriu</p>";
  }else{
    echo "<p>deu erro</p>";
  }

}catch(PDOException $e){
 echo "Error: ".$e->getMessage()."<br>";
}

include './anti_injection.php';

$query = "echo'teste'";
$injetc = anti_injection($query);
echo $injetc;