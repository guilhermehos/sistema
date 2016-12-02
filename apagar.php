<?php 
include ("config.php");



                  $id = $_GET['id'];
                  $select = $mysqli -> query("DELETE FROM registros WHERE id='$id'");

                  echo "<script> alert('Apagado com sucesso!'); 
                  location.href=('registrado.php');
                  </script>";

?>