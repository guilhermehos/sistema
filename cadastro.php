<?php

	require ("config.php");
	include ("inc_head.php");	
?>

<title>Cadastro</title>
</head>

<body>

       <div id="cadastrar" ><a href="index.php" title="Faça login!">Login &raquo;</a></div>
		<div id="login" class="form bradius">
  			<div class="logo"><img src="css/imagens/logo.png" width="200" height="58" /></div>

  

  <div class="acomodar" ng-app="formfunc" ng-controller="funccontroller">
            <form id="form_cadastro" name="form_cadastro" method="post" action="">
            <label for="nome">Nome: </label><input id="nome" type="text" class="txt bradius" name="nome"  />
             <label for="mat">Matrícula: </label><input id="mat" type="text" class="txt bradius" name="mat"  />
            <label for="email">E-mail: </label><input id="email" type="text" class="txt bradius" name="email" />
            <label for="senha">Senha: </label><input  id="senha" type="password" class="txt bradius" name="senha"  />
            <input type="submit" class="sb bradius" value="Cadastrar" name="button"/>
                  </form>
</div>
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
			$insert = $mysqli->query("INSERT INTO `usuarios`(`nome`, `mat`, `email`, `senha`, `nivel`, `status`) VALUES ('$nome', '$mat', '$email', '".md5($senha)."', '0', '0')");
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