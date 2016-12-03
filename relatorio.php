<?php 
	require ("config.php");
	require ("panel/protect.php");
  include ("inc_head.php");
  include ("link_topo.php"); 
  $data = date('Y'); // Pega ano atual
?>
<?php
    $query = "SELECT classificacao, count(ID) AS total FROM registros where ano='$data' GROUP BY classificacao";
    $result=mysqli_query($mysqli,$query);
?>

<title>Relatórios</title>
</head>


<body>
  <div class="col-xs-12">
    <div class="container">
    <div class="col-xs-12">
      <h1>Relatório de <?php print $data ?> </h1>
      <button onclick="geraRelatorio()" class="btn btn-default" name="relatorio">Gerar Relatorio</button>
      <div id="chart_wrap">
        <div id="chart">
    </div>
        </div>
      </div>
      <div class="col-xs-12">
      <h1>Personalizado</h1>
      <button onclick="geraRelatorioPersonalizado()" class="btn btn-default" name="personalizado">Gerar Relatório Personalizado</button>
      <div id="chart_wrap">
        <div id="chart">

        <form class="form-group" name="anoconsulta" method="post" action="">

            <label for="anoconsulta" >Escolha o ano desejado:</label><br />
         
             <select name="anoconsulta" id="anoconsulta">
               <option></option>
               <option>2015</option>
               <option>2016</option>
               <option>2017</option>
               <option>2018</option>
               <option>2019</option>
               <option>2020</option>
               <option>2021</option>
               <option>2022</option>
               <option>2023</option>
               <option>2024</option>
               <option>2025</option>
               <option>2026</option>
               <option>2027</option>  
              </select><br /><br />
              
             <button type="submit" class="btn btn-default" name="button">Enviar</button><br /><br />
           
            </form> 
                
                <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                    <thead>
                  <tr class="active">
                      <th>Eventos</th>
                      <th>Quantidade</th>
                      <th>TOTAL</th>
                  </tr>
                      </thead>
                            
                      <tbody>
<?php
  if (isset($_POST["button"])) {
    $anoconsulta = mysqli_real_escape_string($mysqli, $_POST["anoconsulta"]);
    
    if($anoconsulta == "") {
      echo "<script> alert('Preencha o registro!'); </script>";
      return true;
    }
    $query1 = "SELECT count(ID) AS total FROM registros where ano='$anoconsulta'";
    $result1 = mysqli_query($mysqli,$query1);
    $values = mysqli_fetch_assoc($result1);
    $num_rows = $values['total'];

    $query = "SELECT classificacao, count(ID) AS numero FROM registros where ano='$anoconsulta' GROUP BY classificacao";
    $result=mysqli_query($mysqli,$query);
    while($row = mysqli_fetch_array($result))
          {
            
?>

                         
                          <tr>
                            <td><?php echo $row ["classificacao"] ?></td>
                            <td><?php echo $row ["numero"] ?></td>

                          <?php 
                          }?>
                          <td><?php echo $num_rows ?></td>
                          </tr>
                          <?php
                            }else {
                            echo "Nenhum ano escolhido!","<br />";
                            }
                
    ?>
    
                         </tbody>
                </table>    
                

    </div>
        </div>
      </div>
  </div>
</div>

   

</body>
<?php 
include ("footer.php");
$data = date('Y'); // Pega ano atual
?>


<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript" src="js/load.js"></script>
<script type="text/javascript" src="js/jquery.throttledresize.js"></script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Classificacao', 'Total'],
          <?php
          while($row = mysqli_fetch_array($result))
          {
            echo "['".$row["classificacao"]."', ".$row["total"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Gráfico de Eventos PREAC do ANO: <?php print $data; ?>'
        };


        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        chart.draw(data, options);
      }

      </script>

      <script> 
                
          var data = "<?php print $data; ?>";

                function geraRelatorio() {
                  
                        if(confirm('O relatório será gerado!')) {
                            window.open('gerarelatorio.php?ano='+data, '_blank');
                        } else {
                            alert('Cancelado!');
                                }
                          };

          </script>

<script> 
                
            var datapersonalizada = "<?php print $anoconsulta; ?>";

                function geraRelatorioPersonalizado() {
                  
                        if(confirm('O relatório será gerado!')) {
                            window.open('gerarelatoriopersonalizado.php?ano='+datapersonalizada, '_blank');
                        } else {
                            alert('Cancelado!');
                                }
                          };

          </script>


