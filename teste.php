<?php
    require_once('conexaobd.php');
    $sql = $conexao->prepare("SELECT*FROM modelo order by nomemodelo ");// where idmarca = $marca"
    $sql->execute();
    $retorno = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($retorno as $res){
        /*var_dump($res);
        echo "</br>";*/
        echo "</br>";
       // echo json_encode($res);
        echo "</br></br></br>";
        //echo "VAR EXPORT";
        //var_export($res);
        
    }
    echo json_encode($res);
    