<?php
//inicia a conexão com dados informados
try{
$conn = new PDO ("mysql:host=localhost;
                database=banco_de_dados","login","senha");
}catch (PDOException $e){
    echo $e->getCode(); //mostra erro 
}
?>