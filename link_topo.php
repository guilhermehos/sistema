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

<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<a href="?action=sair"> <button class="btn btn-danger pull-right col-lg-1">  Sair  </button> </a>
		</div>
	</div>
</div>

<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<img src="css/imagens/logo_topo.png" class="img-responsive bottom" />
				<ul class="nav nav-justified nav-pills">
					<li role="presentation"><a href="registrado.php?" class="bgColor1 bgHover2" target="_self">Início</a></li>
					<li role="presentation"><a href="registro.php?" class="bgColor1 bgHover2" target="_self">Inserir Registro</a></li>
					<li role="presentation"><a href="relatorio.php?" class="bgColor1 bgHover2" target="_self">Relatórios</a></li>
					<li role="presentation"><a href="downloads.php?" class="bgColor1 bgHover2" target="_self">Downloads</a></li>
					<li role="presentation"><a href="ajuda.php?" class="bgColor1 bgHover2" target="_self">Ajuda</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>