<?php
session_start();

function logar(){
if(isset($_SESSION['user']) && isset($_SESSION['password'])){
    
    return true;
    
}else{
    return false;
}
}
$logado =logar();
?>