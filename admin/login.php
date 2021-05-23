<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--Style me-->
    <link rel="stylesheet" href="./css/style.css">
    <title>Login SmartFipe</title>
</head>
<body>
<header>
<nav class="nav nav-pills nav-justified" style="color: black;">
   <h2 class="display-4">Admin smartfipe</h2>
</nav>
</header>
<main>
<div class="container">
    <form action="#" method="post" class="form-group">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Login">
            <label for="floatingInput">Login:</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Senha">
        <label for="floatingPassword">Senha:</label>
        </div>
        <button type="submit"class="btn btn-primary" >Logar</button>
    </form>
</div>
</main>
<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['password'])){
    
    echo"usuario ja logado";
    echo "<script>window.location ='index.php';</script>";
    
}else{
    if(empty($_POST['login']) || empty($_POST['pass'])){
        echo "<div class='alert alert-danger' role='alert'>
                <p>Preencha os campos!!!</p>
            </div>";
    }else{
    try{
        require_once "../conexaobd.php";
        require_once "./anti_injection.php";
        $user = anti_injection($_POST['login']) ;
        $senha = $_POST['pass'];
        $sql = $conexao->prepare("SELECT*FROM user WHERE login='$user'");
        $sql->execute();
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
       }catch(PDOException $e){
           echo "Error: ".$e->getMessage()."<br>";
       }
       
       if($sql->rowCount()==true && (password_verify($_POST['pass'],$res[0]['senha']))){// se achar algo retorna true
           
           $_SESSION['user'] = $res[0]['login'];
           $_SESSION['password'] = $res[0]['senha'];
           echo "<script>window.location ='index.php';</script>";
       }else{
           echo "<div class='alert alert-danger' role='alert'>
                     <p>Login ou senha incorretos</p>
                </div>";
       }
}
}
?>

<!--Bootstrap popper+js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Fontawesome <icones>-->
<script src="https://kit.fontawesome.com/3e9e6ed07b.js" crossorigin="anonymous"></script>
</body>
</html>