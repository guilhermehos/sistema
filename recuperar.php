<?php

	require ("config.php");
	include ("inc_head.php");	
?>

<title>Recuperar</title>
</head>

<body>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <a href="cadastro.php" title="Cadastre-se e faça parte da nossa equipe!">
            <button class="btn btn-primary pull-right">  Cadastre-se &raquo;  </button>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 login">
          <div class="col-xs-12">
            <img src="css/imagens/logo.png" class="img-responsive center-block bottom top" />
          </div>
          <form id="form_cadastro" name="form_cadastro" action="" method="post">
            <div class="col-xs-12 form-group">
              <label for="email"> </label><input id="email" type="email" class="txt form-control input-lg" name="email" value="" placeholder="E-mail" />
            </div>
            <div class="col-xs-12 form-group">
              <input type="submit" class="bgColor1 bgHover2 btn btn-lg input-lg form-control" value="Recuperar" name="button"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
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
	$Mailer->Username = "noreplycisguanabara@gmail.com";
	$Mailer->Password = "admin020918";
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = "noreplycisguanabara@gmail.com";
	
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
