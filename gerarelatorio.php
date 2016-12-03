<?php
require ("config.php");
include ("pdf/mpdf.php");

$data = $_GET['data'];

$query1 = "SELECT count(ID) AS total FROM registros where ano='$data'";
    $result1 = mysqli_query($mysqli,$query1);
    $values = mysqli_fetch_assoc($result1);
    $num_rows = $values['total'];
  
 $query = "SELECT classificacao, count(ID) AS numero FROM registros where ano='$data' GROUP BY classificacao";
  $result=mysqli_query($mysqli,$query);
    while($row = mysqli_fetch_array($result))
    {
              
    
      $relatorio = 
        '<html>
            <body>
                <img src="css/imagens/logo.png">

                <div class="col-xs-12">  
                
                <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                    <thead>
                  <tr class="active">
                      <th>Eventos</th>
                      <th>Quantidade</th>
                      <th>TOTAL</th>
                  </tr>
                      </thead>
                            
                      <tbody>
                         
                          <tr>
                            <td>'.$row["classificacao"].'</td>
                            <td>'.$row["numero"].'</td>
                            <td>'.$num_rows.'</td>
                          </tr>
                          
                         
                         </tbody>
                </table> 
                </div>   
      

                         
                
                    </body>
                  </html>';

                   }

                  // criar objeto
                  $mpdf = new mPDF();

                  $mpdf->SetDisplayMode('fullpage');

                  $mpdf->allow_charset_corversion = true;

                  $mpdf->charset_in = 'UTF-8';

                  $css = file_get_contents("css/bootstrap.css");

                  $mpdf->WriteHTML($css,1);

                  $mpdf->WriteHTML($relatorio);

                  $mpdf->Output('Relatorio gerado','I');

                  exit;
               
            
?>