<?php

	require ("config.php");
	include ("inc_head.php");
	
?>


<title>Login</title>
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
					<form id="form_login" name="form_login" method="post" action="">
						<div class="col-xs-12 form-group">
							<label for="email"> </label><input id="email" type="email" class="txt form-control input-lg" name="email" value="" placeholder="E-mail" />
						</div>
						<div class="col-xs-12 form-group">
							<label for="senha"> </label><input  id="senha" type="password" class="txt form-control input-lg" name="senha" value="" placeholder="Senha" />
							<a href="recuperar.php" class="color2" title="Recupera senha!">Esqueci minha senha?</a>
						</div>
						<div class="col-xs-12 form-group">
							<input type="submit" class="bgColor1 bgHover2 btn btn-lg input-lg form-control" value="Entrar" name="button"/>
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
		$email = mysqli_real_escape_string($mysqli, $_POST["email"]);
		$senha = mysqli_real_escape_string($mysqli, $_POST["senha"]);
		
		if($email == "" || $senha == "") {
			echo "<script> alert('Preencha todos os campos!'); </script>";
			return true;
		}
		
		$select = $mysqli->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");
		$row = $select->num_rows;
		$get = $select->fetch_array();
		$nome = $get['nome'];
		$nivel = $get['nivel'];
		$status = $get['status'];
		$iduser = $get['ID'];
		
		if ($row > 0) {
			if ($status == 0) {
				echo "<script> alert('Aguarde aprovação!'); </script>";
			}else{
				if ($nivel == 1) {
				session_start();
				$_SESSION["nivel"] = 1;
				$_SESSION['idusuario']=$iduser; 
				$_SESSION['nomeuser']=$nome; 
			header("Location://localhost/sistema/admin.php?");  //MUDAR LOCAL 

			}else {
				session_start();
				$_SESSION["nivel"] = 0;
				$_SESSION['idusuario']=$iduser; 
				$_SESSION['nomeuser']=$nome;
			header("Location://localhost/sistema/registro.php?");  //MUDAR LOCAL	
		           } 
		}
	}else {
			echo "<script> alert('Usuário ou senha incorreto!'); </script>";
		}
	
		}		
?> 

