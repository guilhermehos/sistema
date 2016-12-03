<?php

include("../config.php");
?>

<?php
	
	$id = $_GET['id'];
	$select = $mysqli -> query("UPDATE usuarios SET status='0' WHERE ID='$id'");

	echo "<script> location.href='../admin.php?pagina=1'; </script>";



?>