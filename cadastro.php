<?php

	require ("config.php");
	include ("inc_head.php");	
?>

<title>Cadastro</title>
</head>

<body>	
<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a href="index.php" title="Faça login!">
						<button class="btn btn-success pull-right">  Login &raquo;  </button>
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
							<label for="nome"> </label><input id="email" type="text" class="txt form-control input-lg" name="nome" value="" placeholder="Nome" />
						</div>
						<div class="col-xs-12 form-group">
							<label for="mat"> </label><input id="mat" type="number" class="txt form-control input-lg" name="mat" value="" placeholder="Matrícula" />
						</div>
						<div class="col-xs-12 form-group">
							<label for="email"> </label><input id="email" type="email" class="txt form-control input-lg" name="email" value="" placeholder="E-mail" />
						</div>
						<div class="col-xs-12 form-group">
							<label for="senha"> </label><input  id="senha" type="password" class="txt form-control input-lg" name="senha" value="" placeholder="Senha" />
						</div>
						<div class="col-xs-12 form-group">
							<input type="submit" class="bgColor1 bgHover2 btn btn-lg input-lg form-control" value="Cadastrar" name="button"/>
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
		$nome = mysqli_real_escape_string($mysqli,$_POST["nome"]);
		$mat = mysqli_real_escape_string($mysqli,$_POST["mat"]);
		$email = mysqli_real_escape_string($mysqli,$_POST["email"]);
		$senha = mysqli_real_escape_string($mysqli,$_POST["senha"]);
		
		if ($nome == "" || $mat == "" || $email == "" || $senha == "") {
			echo "<script> alert ('Preencha todos os campos!'); </script>";
			return true;
		}
		$select = $mysqli->query("SELECT * FROM usuarios WHERE email='$email'");
		if ($select){
		$row = $select->num_rows;
		if($row > 0) {
			echo "<script> alert ('Já existe um usuário com este e-mail!'); </script>";
		} else {
			$insert = $mysqli->query("INSERT INTO `usuarios`(`nome`, `mat`, `email`, `senha`, `nivel`, `status`) VALUES ('$nome', '$mat', '$email', '$senha', '0', '0')");
			if ($insert) {
				echo "<script> alert ('Usuário registrado com sucesso!'); location.href='index.php' </script>";
			} else {
				echo $mysqli->error;
			}
		}
	} else {
		echo $mysqli->error;
	}
}
?> 