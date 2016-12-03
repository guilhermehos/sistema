<?php 

include ("panel/globais.php");
include ("panel/check.php");
include ("inc_head.php");
require ("config.php"); 

session_start();
$_SESSION['nomeuser'];
$nome = $_SESSION['nomeuser'];
echo "<script> alert('Bem Vindo $nome!'); </script>";
$_SESSION['idusuario'];

$idrec = $_SESSION['idusuario']; // variavel para salvamento automatico de quem criou o evento

if (isset($_GET["action"]) AND $_GET["action"] == "sair") {
  session_destroy();
  header ("Location://localhost/sistema/index.php");
}

?>

<title>Administração</title>

</head>

<body>
<div class="col-xs-12">
  <div class="row">
    <div class="container">
    <a href="?action=sair"> <button class="btn btn-danger pull-right col-xs-2">  Sair  </button> </a>
      <img src="css/imagens/logo_topo.png" class="img-responsive" />
        <div class="col-xs-8">
        <img src="css/imagens/adm.png" class="img-responsive" />
        </div>

               <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                <thead>
                  <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nivel</th>
                        <th>Status</th>
                        <th>Ação</th>
                  </tr>
              </thead>
              <tbody>

<?php
// Conecta ao banco de dados
include ("config.php");

$num_registro = 10; // número de registro que quero que apareça por página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0; // aqui eu pego da url o número da página que estou.
if(empty($pagina))
{
$pagina = 1;
}
$inicio = ($pagina * $num_registro) - $num_registro;  //cálculo para saber em que registro a query deve iniciar sua contagem, pego a página que estou multiplico pelo número de registros que quero que apareça no máximo na página e subtraio por esse mesmo número.

$sqlCont = $mysqli->query("SELECT * FROM usuarios LIMIT $inicio, $num_registro"); // Crio uma query com limitação de registros
$numCont = $sqlCont->num_rows;

$sqlTotal = $mysqli->query("SELECT * FROM usuarios ORDER BY ID DESC"); //faço uma query para o número total de registros no banco
$numTotal = $sqlTotal->num_rows;

if($numCont > 0)
{ 
for($x=0; $x<$numCont; $x++) // faço um for até o número máximo de registros que quero que apareça na página
{
$dados = $sqlCont->fetch_array();


?>
      

                   <!-- Exibir usuários com a função de bloquear e aprovar -->     
                  <tr>
                      <td><?php echo $dados['ID'];?></td>
                      <td><?php echo $dados['nome'];?></td>
                      <td><?php echo $dados['nivel'];?></td>
                      <td><?php echo $dados['status'];?></td>
                      <td><?php if($dados['status'] == 0);?>
                          <a href="panel/status_aprovar.php?id=<?php echo $dados["ID"];?>"> Aprovar |</a>
                          <?php if($dados['status'] == 1);?>
                          <a href="panel/status_bloquear.php?id=<?php echo $dados["ID"];?>"> Bloquear</a>
                      </td>                             
                  </tr>   

                               
                                          
                  
<?php
}
}
else
{
echo "<h3>Nenhum Contato registrado.</h3>";
}
?> 
</tbody>
</table> 
<div align="right" class="col-sm-12">

 <?php

//A partir daqui para baixo eu faço os links da paginação, anterior, próximo, último, etc, que serve para você navegar pela paginação e acessar os registros.
if($numCont > 0)
{
if($numTotal>$num_registro)
{
$totalPag = Ceil($numTotal / $num_registro);
echo '<a href="admin.php?pagina=1"> Primeiro </a>'; 
for($i=1; $i <= $totalPag; $i++)
{
if($pagina == $i)
{
echo "<span>&nbsp; ".$i." &nbsp;<span>";
}
else
{
$indice = "&pagina=".$i;
echo '<a href="admin.php?'.$indice.'">&nbsp; '.$i.' &nbsp;</a>';

}
}
echo '<a href="admin.php?pagina='.$totalPag.'">&nbsp; Último &nbsp;</a>';

} 
} 
?>
</div>
</div>
</body>
</html>



