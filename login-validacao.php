<?php
// Você pode fazer algo parecido com isto:
if(isset($_POST['IDlog'])) {
    $_SESSION['IDreg'] = $_POST['IDlog'];
    echo json_encode(array('outcome'=>'success'));
} else {
    echo json_encode(array('outcome'=>'error','error'=>"Não é possível definir a resolução."));
}

?>


<?php 
	if(!isset($_SESSION)){
		session_start();
	} // Se não tiver nenhuma sessao iniciada nai startar

	require ("config.php");

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
		$idrec	= $get['ID'];
		
		
		if ($row > 0) {
			if ($status == 0) {
				echo "<script> alert('Aguarde aprovação!'); </script>";
			}else{
				if ($nivel == 1) {
				session_start();
				$_SESSION["nivel"] = 1;
				$_SESSION["idrec"] = $idrec;
				echo "<script> alert('Bem vindo $nome $idrec'); location.href='http://143.106.163.126/sistema_teste/admin.php'</script>";  //MUDAR LOCAL 
			}else {
				session_start();
				$_SESSION["nivel"] = 0;
			echo "<script> alert('Bem vindo $nome  $idrec'  ); location.href='http://143.106.163.126/sistema_teste/registro.php'</script>";  //MUDAR LOCAL	
		           } 
		}}else {
			echo "<script> alert('Usuário ou senha incorreto!'); </script>";
		}
	
		}		


?>*/ -->