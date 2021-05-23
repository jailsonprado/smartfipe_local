<?php

    if(!$logado){
        header('location:../login.php');
    }
    
    require_once "../verifica_logado.php";
    require_once "../conexaobd.php";
    require_once "../anti_injection.php";


    if(!isset($_POST['nomemarca'])){ //a varialvel por enquanto esta vindo null, vericar depois
        header('location:../index.php');
    }else{
        $_POST['nomemarca'] = "lenovo";
        $marca = anti_injection($_POST['nomemarca']); //remover caracteres especiais  () */ from, droptable select e etc
        $marca = strtolower($marca);
        //verifica se a marca existe
        $sql = $conexao->prepare("SELECT nomemarca FROM marca WHERE nomemarca= '".$marca."'");
        $sql->execute();
        $rows = $sql->rowCount();

    if($rows>0){ //existe, não? pula para o else
        
         echo "Essa marca ja existe";
       
        exit();
    }else{
        try{
            $insere = $conexao->prepare("INSERT INTO marca values(NULL,'".$marca."')");
            $insere->execute();

        if($insere->rowCount()>0){

           echo '1';
 
        }else{
            echo "0";
        }
    }catch(Exception $e){
        return "Error: ".$e->getMessage()."</br>";
    }
    
    }
    }