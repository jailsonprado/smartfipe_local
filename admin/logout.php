<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['password'])){
session_destroy();
header('location:login.php');
exit();
}else{
    echo "Você ja esta desconectado.....";
    echo "<a href='login.php'>Logar novamente</a>";
}

?>