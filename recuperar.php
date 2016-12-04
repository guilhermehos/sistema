<?php

	require ("config.php");
	include ("inc_head.php");	
?>

<title>Recuperar</title>
</head>

<body>

       <div id="cadastrar" ><a href="index.php" title="Faça login!">Login &raquo;</a></div>
		<div id="login" class="form bradius">
  			<div class="logo"><img src="css/imagens/logo.png" width="200" height="58" /></div>

  

  <div class="acomodar">
            <form id="form_cadastro" name="form_cadastro" action="" method="post">
      
            <label for="email">E-mail: </label><input id="email" type="text" class="txt bradius" name="email" />
            
            <input type="submit" class="sb bradius" value="Recuperar" name="button"/>
                 
                  </form>
</div>
</body>
</html>

<?php
if (isset($_POST["button"])) {
	$email = mysqli_real_escape_string($mysqli,$_POST["email"]);

	if ($email == "") {
			echo "<script> alert ('Preencha o E-mail!'); </script>";
			return true;
		} 
    
    
      	$select = $mysqli->query("SELECT * FROM usuarios WHERE email='$email'");
		if ($select){
		$row = $select->num_rows;
		if($row > 0) {
			$get = $select->fetch_assoc();

		$nome = $get['nome'];
		$email = $get['email'];
		$mat = $get['mat'];
		$senha = $get['senha'];


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
	$Mailer->Host = "smtp.gmail.com";
	//Porta de saida de e-mail 
	$Mailer->Port = 465; //465
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = "noreplyesportivos@gmail.com";
	$Mailer->Password = "gui395778";
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = "noreplyesportivos@gmail.com";
	
	//Nome do Remetente
	$Mailer->FromName = 'Suporte CIS';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Titulo - Recuperar Senha';
	
	//Corpo da Mensagem
	$Mailer->Body .= "Prezado ".$nome." segue E-mail: ".$email." e Senha: ".$senha." ";
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress ($email);
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}


echo "<script> alert ('Verifique seu e-mail!'); location.href='index.php' </script>";
	
      }
      else {
      	echo "<script> alert ('Nenhum e-mail encontrado!') </script>";
      }

  }

}
    	
?> 
