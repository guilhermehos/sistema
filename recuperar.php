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
      
           
            <label for="mat">Matrícula: </label><input id="mat" type="text" class="txt bradius" name="mat"  />
            <label for="email">E-mail: </label><input id="email" type="text" class="txt bradius" name="email" />
            
            <input type="submit" class="sb bradius" value="Recuperar" name="button"/>
                 
                  </form>
</div>
</body>
</html>

<?php
if (isset($_POST["button"])) {
    $mat = mysqli_real_escape_string($mysqli,$_POST["mat"]);
	$email = mysqli_real_escape_string($mysqli,$_POST["email"]);
    
    
      	$select = $mysqli->query("SELECT * FROM usuarios WHERE email='$email' OR mat='$mat'");
		$row = $select->num_rows;
		$get = $select->fetch_array();
		$emailenvia = $get['email'];
		$matenvia = $get['mat'];
		$senhaenvia = $get['senha'];

		$_SESSION['emailuser']=$emailenvia; 
		$_SESSION['mat'] = $matenvia;
		$_SESSION['senha']=$senhaenvia; 
			header("Location://localhost/sistema/recuperando.php?");  //MUDAR LOCAL 

		return true;
      }
    	
?> 
