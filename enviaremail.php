<?php
//error_reporting(0);
include ('conexao/connect.php');
include "funcoes.php";
require "PHPMailer/PHPMailerAutoload.php";


session_start();
$destinatario = $_POST['email'];
$meuid = $_SESSION['PesId'];

if(validaemail($destinatario)){ 

    $mail = new PHPMailer;
    $mail->isSMTP();

    //Configurações do servidor de e-mail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->SMTPDebug = 3;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = "true";
    $mail->Username = "suportecca558@gmail.com";
    $mail->Password = "Winteriscoming";

    //Configuração de mensagem
    $mail->setFrom($mail->Username,"Atendimento CCA"); //remetente
    $mail->addAddress($destinatario); //Destinatário
    $mail->Subject = "Redefinir senha"; //Assunto

    $conteudo_email = "

    Clique no link para a recuperação de senha:
    

    ";

    $mail->IsHTML(true);
    $mail->Body = $conteudo_email;

    if($mail->send()){
        echo "E-mail enviado com sucesso!";
    }else{
        echo "Falha ao enviar o email\n". $mail->ErrorInfo;
    }
}else{
    echo "E-mail inválido";
}
?>
