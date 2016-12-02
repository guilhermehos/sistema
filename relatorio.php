<?php 
	require ("config.php");
	require ("panel/protect.php");
  include ("inc_head.php");
  include ("link_topo.php");

     $data = date('Y'); // Pega ano atual 
?>

<title>Relatórios</title>
</head>


<body>
  <div class="col-xs-12">
    <div class="container">
    <div class="col-xs-6">
      <h1>Relatório de <?php print $data ?> </h1>
      <div id="chart_wrap">
        <div id="chart">
    </div>
        </div>
      </div>
      <div class="col-xs-6">
      <h1>Relatório Personalizado</h1>
      <div id="chart_wrap">
        <div id="chart">

        <form name="ano" method="post" action="">
            <label for="ano" >Escolha o ano desejado:</label><br />
             <div class="col-xs-6">
             <select name="ano" id="ano">
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
              </div>
             <button type="submit" class="btn btn-default" name="button">Enviar</button><br /><br />
            </form> 
                
                <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                    <thead>
                  <tr class="active">
                      <th>Cursos</th>
                      <th>Espetáculos</th>
                      <th>Evento</th>
                      <th>Evento EXT</th>
                      <th>Oficinas</th>
                      <th>Oficinas PARC</th>
                      <th>Palestras</th>
                  </tr>
                      </thead>
                            
                      <tbody>
<?php
  if (isset($_POST["button"])) {
    $ano = mysqli_real_escape_string($mysqli, $_POST["ano"]);
    
    if($ano == "") {
      echo "<script> alert('Preencha o registro!'); </script>";
      return true;
    }
    
    $select = $mysqli->query("SELECT * FROM registros WHERE ano='$ano'");
    while($dados = $select->fetch_array())
    {
     
?>
                         
                          <tr>
                            <td><?php echo $dados["id_questoes"]; ?></td>
                            <td><?php echo $dados["pergunta"]; ?></td>
                            <td><?php echo $dados["resposta"]; ?></td>
                            <td><?php echo $dados["id_questoes"]; ?></td>
                            <td><?php echo $dados["pergunta"]; ?></td>
                            <td><?php echo $dados["resposta"]; ?></td>
                            <td><?php echo $dados["resposta"]; ?></td>
                          </tr>
                          
                         
                         <?php 
                }
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



 $query = "SELECT classificacao, count(*) as "

?>


<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript" src="js/load.js"></script>
<script type="text/javascript" src="js/jquery.throttledresize.js"></script>
<script type="text/javascript">


 google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      $(window).on("throttledresize", function (event) {
    drawChart();
});

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Cursos Ministrados',     11],
          ['Espetáculos e Eventos Culturais',      2],
          ['Evento Cultural de Inclusão Social',  2],
          ['Eventos Externos', 2],
          ['Oficinas',    7],
          ['Oficinas em Parceria',    7],
          ['Palestras, Congresso e Seminários',    7]
        ]);

        var options = {
          title: 'Gráfico de Eventos PREAC do ANO: <?php print $data; ?>',
          is3D: true, 
          width: '100%',
          height: '100%',
          chartArea: {
            left: "3%",
            top: "3%",
            height: "94%",
            width: "94%",
          }
        };


        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        chart.draw(data, options);
      }

      </script>

