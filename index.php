<?php

	require ("config.php");
	include ("inc_head.php");
	
?>


<title>Login</title>
</head>

<body>
<div id="cadastrar"><a href="cadastro.php" title="Cadastre-se e faça parte da nossa equipe!">Cadastre-se &raquo;</a></div>
<div id="login" class="form bradius">
  <div class="logo"><img src="css/imagens/logo.png" width="200" height="58" /></div>
  <div class="acomodar">
        <form id="form_login" name="form_login" method="post" action="">
            <label for="email">E-mail: </label><input id="email" type="text" class="txt bradius" name="email" value="" />
            <label for="senha">Senha: </label><input  id="senha" type="password" class="txt bradius" name="senha" value="" />
            <input type="submit" class="sb bradius" value="Entrar" name="button"/>
                  </form>
       <!--login-->
</div>
</body>
</html>




<?php
	if (isset($_POST["button"])) {
		$email = mysqli_real_escape_string($mysqli, $_POST["email"]);
		$senha = mysqli_real_escape_string($mysqli, md5($_POST["senha"]));
		
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
			header("Location://143.106.163.126/sistema_teste/admin.php?");  //MUDAR LOCAL 
			}else {
				session_start();
				$_SESSION["nivel"] = 0;
				$_SESSION['idusuario']=$iduser; 
			header("Location://143.106.163.126/sistema_teste/registro.php?");  //MUDAR LOCAL	
		           } 
		}
	}else {
			echo "<script> alert('Usuário ou senha incorreto!'); </script>";
		}
	
		}		
?> 

