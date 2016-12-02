<?php 
	require ("config.php");
	require ("panel/protect.php");
  	include ("inc_head.php");
  	include ("link_topo.php");
?>

<div class="col-xs-12">
	<div class="row">
		<div class="container" align="center">
		<h3>Bem-vindo à Central de Ajuda!</h3>
<br>
<br>
<br>
<div class="col-xs-12 sidebar-offcanvas">
	<div class="list-group">
<!-- começo dos botões --> 
<div ng-app="myApp" ng-controller="inicioCtrl">

<button class="but1 but-rc list-group-item" align="center" ng-click="toggle1()"> + Sobre a página Início</button>

<p ng-show="myVar">
1 - INICIO: {{iniciar}}
<img src="css/imagens/ajuda_imgs/ajuda.png" class="img-responsive" />
</p>
<br>
<br>

<button class="but1 but-rc list-group-item" align="center" ng-click="toggle2()"> + Sobre a página Inserir Registro</button>

<p ng-show="myVar2">
2 - INSERIR REGISTRO: {{insere}}
</p>
<br>
<br>

<button class="but1 but-rc list-group-item" align="center" ng-click="toggle3()"> + Sobre a página Relatórios</button>

<p ng-show="myVar3">
3 - RELATORIO: {{relatorio}}
</p>
<br>
<br>

<button class="but1 list-group-item" text-align="center" ng-click="toggle4()"> + Sobre a página Downloads</button>

<p ng-show="myVar4">
4 - DOWNLOAD: {{download}}
</p>
<br>
<br>



</div>

		
			
		
		</div>
	</div>
</div>
<?php 
include ("footer.php");
?>