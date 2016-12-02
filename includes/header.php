<?php

#Globais
$home="http://localhost/sistema";
$title="Administração";

//Conexão com o banco de dados
include("classes/DB.class.php");
$conectar=new DB;
$conectar=$conectar->conectar();

$query=mysql_query("SELECT * FROM usuario");
echo mysql_num_rows($query);


?>