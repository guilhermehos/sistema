<?php 
	require ("config.php");
	include ("inc_head.php");
	include ("seguranca.php");
	protegePagina(); 
	session_start();

$idrec = $_SESSION['idusuario']; // variavel para salvamento automatico de quem criou o evento

if (isset($_GET["action"]) AND $_GET["action"] == "sair") {
  session_destroy();
  header ("Location://localhost/sistema/index.php");
}



?>

<div class="col-xs-12">
	<div class="row">
		<div class="container">
		<a href="?action=sair"> <button class="btn btn-danger pull-right col-xs-2">  Sair  </button> </a>
			<img src="css/imagens/logo_topo.png" class="img-responsive" />

			 
			 		
			 		
			
			            <ul class="nav nav-justified nav-pills">
			              <li role="presentation"><a href="registrado.php?" target="_self">Início</a></li>
			              <li role="presentation"><a href="registro.php?" target="_self">Inserir Registro</a></li>
			              <li role="presentation"><a href="relatorio.php?" target="_self">Relatórios</a></li>
			              <li role="presentation"><a href="downloads.php?" target="_self">Downloads</a></li>
			              <li role="presentation"><a href="ajuda.php?" target="_self">Ajuda</a></li>
			            </ul>
			            
			           
			         
		</div>
	</div>
</div>