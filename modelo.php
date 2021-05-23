<?php

require_once(  './conexaobd.php');
	//exibe marca
    if(isset($_GET['idmarca'])){
    $marca = json_encode($_GET["idmarca"]);
	$sql = $conexao->prepare("SELECT*FROM modelo where idmarca = $marca order by nomemodelo ");// where idmarca = $marca"
	$sql->execute();
	$retorno = $sql->fetchAll(PDO::FETCH_ASSOC);
    if($sql->rowCount()){
        foreach($retorno as $res){
        //echo "<option value=".$res['idmodelo']." >".$res['nomemodelo']." </option>";
        
        echo "<option value=".$res["idmodelo"]." >".strtoupper($res["nomemodelo"])."</option>";
        
        }
    }else{
        echo "<option value=''>Sem Modelo</option>";
    }
}

//exibe preço
    if(isset($_GET['idmodelo'])){
    $modelo = json_encode($_GET["idmodelo"]);
	$sql = $conexao->prepare("SELECT*FROM modelo where idmodelo = $modelo order by nomemodelo ");// where idmarca = $marca"
	$sql->execute();
	$retorno = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($retorno as $res){
     echo "<table class='table mostrar'>
            <thead>
            <tr scope='row'>
            <th scope='col'>Maior Preço</th>
            <th scope='col'>Menor Preço</th>
            <th scope='col'>Preço Medio</th>
            </tr>
            </thead>
            <tbody>
            <tr scope='row'>
            <td><span>R$</span>".$res["maior_preco"]."</td>
            <td><span>R$</span>".$res["menor_preco"]."</td>
            <td><span>R$</span>".$res["media"]."</td>
            </tr>
            </tbody>
            </table>";
    
       
    }
   
}
    
    ?>