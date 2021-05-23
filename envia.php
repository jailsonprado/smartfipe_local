<?php 

require_once "./PHPMailer/src/PHPMailer.php";
require_once "./PHPMailer/src/SMTP.php";
require_once "./PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/*
$dest = "contato@smartfipe.com.br";
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$msg = $_POST['mensagem'];
*/
/*
    $headers = "MIME-version 1.1 \n";
    $headers.="From: Contato - Site <".$dest.">\r\n"."X-MAILER: PHP/".phpversion()."\r\n";
    $headers.="Content-type texte/html; charset=utf-8\n";
    $headers.="Return-Path: ".$nome."<".$email.">\n";
    $headers.="Cc: contato - Site <contato@smartfipe.com.br>\n";
    $headers.="Replay-To: ".$$email."\n";
    $to = "Contato - Site <".$dest.">";
    $subject = "Contato - Site - contato cliente";

    $conteudo .= "
                <h3>Contato do cliente".$nome."<h3/><br>
                E-mail: ".$email."<br>
                Telefone:".$telefone."<br>
                Mensagem: ".$msg."
    
    ";
    $envio = mail($to,$subject,$conteudo,$headers);

    if($envio){
        ?>
        <Script>
            alert("Enviado com Sucesso");
        </Script>
        <?php
    }else{
        ?>
        <script>
            alert("Erro no envio!!!");
            history.go(-1);
        </script>
        <?php
    }
*/

        $mail = New PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.smartfipe.com.br';
        $mail->SMTPAuth = true;
        $mail->Username = 'contato@smartfipe.com.br';
        $mail->Password = 'Dp795347';
        $mail->Port = 587;

        $mail->setFrom('walisonmelomiranda@gmail.com');
        $mail->addAddress('walisonmelomiranda@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "ALTERAÇÃO DE SENHA LOCAL";
        /*E-mails que aceita HTML */
        $mail->Body = "teste de e-mail";
        /*E-mail que não aceita HTML */
        $mail->AltBody = "teste de e-mail";

        if($mail->send()){
            echo 'E-mail enviado com sucesso';
        }else{
            echo 'E-mail não enviado';
           
        }

    

    


echo "<p><a href='./index.php'>Voltar</a></p>";


?>