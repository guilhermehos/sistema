<?php 
	require ("config.php");
  	include ("inc_head.php");
  	include ("link_topo.php");
?>

<div class="row">
	<div class="container">
		<div class="col-xs-12">
		<h3 class="text-center">Bem-vindo à Central de Ajuda!</h3>

			<div class="col-xs-12 sidebar-offcanvas">
				<div class="list-group">
					<!-- começo dos botões --> 
					<div ng-app="myApp" ng-controller="inicioCtrl">

						<button class="but1 top but-rc list-group-item" align="center" ng-click="toggle1()"> + Sobre a página Início</button>

						<p ng-show="myVar">
							1 - INICIO: {{iniciar}}
							<img src="css/imagens/ajuda_imgs/inicio.png" class="img-responsive" />
						</p>



						<button class="but1 top but-rc list-group-item" align="center" ng-click="toggle2()"> + Sobre a página Inserir Registro</button>

						<p ng-show="myVar2">
							2 - INSERIR REGISTRO: {{insere}}
							<img src="css/imagens/ajuda_imgs/registros1.png" class="img-responsive" />
						<br />
							<img src="css/imagens/ajuda_imgs/upimg.png" class="img-responsive" />
						</p>


						<button class="but1 top but-rc list-group-item" align="center" ng-click="toggle3()"> + Sobre a página Relatórios</button>

						<p ng-show="myVar3">
							3 - RELATORIO: {{relatorio}}
							<img src="css/imagens/ajuda_imgs/gerarrel.png" class="img-responsive" />
						<br />
							<img src="css/imagens/ajuda_imgs/gerarrelatorio.png" class="img-responsive" />
						</p>

						<button class="but1 top list-group-item" text-align="center" ng-click="toggle4()"> + Sobre a página Downloads</button>

						<p ng-show="myVar4">
							4 - DOWNLOAD: {{download}}
							<img src="css/imagens/ajuda_imgs/down.png" class="img-responsive" />
							<br />
							<img src="css/imagens/ajuda_imgs/registroid.png" class="img-responsive" />
						</p>

					</div>

				</div>
			</div>
		</div>
<?php 
include ("footer.php");
?>