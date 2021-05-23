<?php
//Importando arquivos da biblioteca PHPMailer para enviar e-mails

require_once("./PHPMailer/src/PHPMailer.php");
require_once("./PHPMailer/src/SMTP.php");
require_once("./PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = New PHPMailer(true);//true para poder usar o LOG

$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['telefone'];
$msg = $_POST['mensagem'];

if(($nome=="")||($email==""||($tel="")||($msg=""))){
    echo "alert(Favor preencher todos os campos!!!)";
}else{
    try{
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;//mostra log
        $mail->isSMTP();
        $mail->Host = "email-ssl.com.br";
        $mail->SMTPAuth = true;
        $mail->Username = "seu_email@mail.com";
        $mail->Password = "sua senha";
        $mail->Port = 465;


        $mail->setFrom("{$email}");//e-mail do remetente
        $mail->addAddress("email@email");//e-mail do destinatario

        $mail->isHTML(true);//Diz que vamos utilizar a mensagem em HTML
        /*Se o servidor SMTP aceitar e-mail do formato HTML sera envido aqui */
        $mail->Subject = "Contato do Cliente - SmartFipe";//assunto do e-mail
        $mail->Body = "<strong>Dados do Cliente</strong><br>\n
                        Nome do Cliente: {$nome}<br>\n
                        E-mail do Cliente: {$email}<br>\n
                        Telefone do Cliente: {$tel}<br>\n
                        Mensagem: {$msg}<br>";//Corpo do e-mail

        /*Caso não aceite o HTML sera enviado aqui*/
        $mail->AltBody = "Dados do Cliente\n
                        Nome do Cliente: {$nome}\n
                        E-mail do Cliente: {$email}\n
                        Telefone do Cliente: {$tel}\n
                        Mensagem: {$msg}";

        if($mail->send()){
            echo "E-mail enviado com sucesso";
            header('location:index.html');
        }else{
            echo "Ocorreu um erro";
        }


    }catch(Exception $e){
        echo "Erro ao enviar o e-mail: {$mail->info}";//caso der algum erro vai ser retornado na "info"
    }
}

?>