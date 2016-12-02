<?php

	require ("config.php");
  require ("panel/protect.php");
  include ("inc_head.php");
  include ("link_topo.php")
	
?>

<title>Registrados</title>


</head>

<body>

              <div class="container">
                  <div class="row">
                <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                    <thead>
                  <tr class="active">
                      <th>Registro</th>
                      <th>Nome da atividade</th>
                      <th>Data</th>
                      <th>Horário inícial</th>
                      <th>Horário final</th>
                      <th>Detalhes</th>
                  </tr>
                      </thead>
                            
                      <tbody>
<?php
// Conecta ao banco de dados
include ("config.php");

$num_registro = 20; // número de registro que quero que apareça por página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0; // aqui eu pego da url o número da página que estou.
if(empty($pagina))
{
$pagina = 1;
}
$inicio = ($pagina * $num_registro) - $num_registro;  //cálculo para saber em que registro a query deve iniciar sua contagem, pego a página que estou multiplico pelo número de registros que quero que apareça no máximo na página e subtraio por esse mesmo número.

$sqlCont = $mysqli->query("SELECT * FROM registros LIMIT $inicio, $num_registro"); // Crio uma query com limitação de registros
$numCont = $sqlCont->num_rows;

$sqlTotal = $mysqli->query("SELECT * FROM registros ORDER BY ID DESC"); //faço uma query para o número total de registros no banco
$numTotal = $sqlTotal->num_rows;

if($numCont > 0)
{ 
for($x=0; $x<$numCont; $x++) // faço um for até o número máximo de registros que quero que apareça na página
{
$dados = $sqlCont->fetch_assoc();


?>
                         
                          <tr>
                         	  <td><?php echo $dados["ID"]; ?></td>
                            <td><?php echo $dados["reg_nome_ativ"]; ?></td>
                            <td><?php echo $dados["data_inicial"]; ?></td>
                            <td><?php echo $dados["hora_inicial"]; ?></td>
                            <td><?php echo $dados["hora_final"]; ?></td>
                            <td><a href="detalhe.php?id=<?php echo $dados["ID"];?>">Acessar detalhes</a> </td>
                          </tr>
                         
                         <?php 
								}
							}else {
								echo "Nenhum registro!";
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
echo '<a href="registrado.php?pagina=1"> Primeiro </a>'; 
for($i=1; $i <= $totalPag; $i++)
{
if($pagina == $i)
{
echo "<span>&nbsp; ".$i." &nbsp;<span>";
}
else
{
$indice = "&pagina=".$i;
echo '<a href="registrado.php?'.$indice.'">&nbsp; '.$i.' &nbsp;</a>';

}
}
echo '<a href="registrado.php?pagina='.$totalPag.'">&nbsp; Último &nbsp;</a>';

} 
} 
?>
</div>     
                </div> 
                </div>

</body>
</html>
<?php 
include ("footer.php");
?>