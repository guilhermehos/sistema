<?php
include ("config.php");
?>

<?php 
$data = json_decode(file_get_contents("php://input"));
$nome = mysql_real_escape_string($data->nome);
$mat = mysql_real_escape_string($data->mat);
$email = mysql_real_escape_string($data->email);
$senha = mysql_real_escape_string($data->senha);

$insert = $mysqli->query("INSERT INTO `usuarios`(`nome`, `mat`, `email`, `senha`, `nivel`, `status`) VALUES ('$nome', '$mat', '$email', '".md5($senha)."', '0', '0')");

if ($insert) {
				echo "<script> alert ('Usuário registrado com sucesso!'); location.href='index.php' </script>";
			} else {
				echo $mysqli->error;
			}
?>