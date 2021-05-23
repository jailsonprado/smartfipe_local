<?php

/*Essa função retira as inconformidades das palavras que possam causar problemas no banco de dados */
function anti_injection($sql){
    $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$sql); // remove palavras que contenham sintaxe sql
    $sql = trim($sql); // limpa espaços vazios
    $sql = strip_tags($sql); // tira tags html e php
    $sql = addslashes($sql); //  adiciona barras invertidas a um string
    return $sql;
}