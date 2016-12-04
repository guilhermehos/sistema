<?php

	require ("config.php");
	include ("inc_head.php");
	include ("seguranca.php");	

session_start();
$emailrec = $_SESSION['emailuser'];
$matrec = $_SESSION['mat'];
$senharec = $_SESSION['senha'];

require 'phpmailer/PHPMailerAutoload.php';
	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';

	$Mailer->SMTPDebug  = 1; 
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl'; //ssl
	
	//nome do servidor
	$Mailer->Host = 'smtp.gmail.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 465; //465
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'noreplyesportivos@gmail.com';
	$Mailer->Password = 'gui395778';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'noreplyesportivos@gmail.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Suporte CIS';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Titulo - Recuperar Senha';
	
	//Corpo da Mensagem
	$Mailer->Body = 'Segue E-mail: .$emailrec. e Senha: .$senharec.' ;
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress($emailrec);
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}


echo "<script> alert ('Verifique seu e-mail!'); location.href='index.php' </script>";

?>