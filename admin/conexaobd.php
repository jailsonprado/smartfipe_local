
<?php
$servidor = "localhost";
$login = "root";
$senha = "root";
$bd = "banco_jailson";

try{
$conexao = new PDO('mysql:host='.$servidor.';dbname='.$bd, $login, $senha);
$conexao->exec("SET CHARACTER SET utf8");
}catch(PDOException $e){
    print "Error!: ".$e->getMessage(). "<br>";
    die();
}

?>