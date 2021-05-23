<?php

require_once "../verifica_logado.php";
if(!$logado){
 header('location:../login.php');
}

                require_once("./conexaobd.php");
                $sql = $conexao->prepare("SELECT*FROM modelo,marca WHERE modelo.idmarca = marca.idmarca");
                $sql->execute();
                $retorno = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach($retorno as $res){
                    
                    }
                    print_r($retorno); 
?>