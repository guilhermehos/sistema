<?php 

  include_once("config.php");
  /*$data = "<script>document.writeln(query_string)</script>";*/
  $anoconsulta = $_GET['ano'];
  $html = '<table border=1';  
  $html .= '<thead>';
  $html .= '<tr>';
  $html .= '<th>Eventos</th>';
  $html .= '<th>Quantidade</th>';
  $html .= '<th>TOTAL</th>';
  $html .= '</tr>';
  $html .= '</thead>';
  $html .= '<tbody>';
  
  
  $query1 = "SELECT count(ID) AS total FROM registros where ano='$anoconsulta'";
    $result1 = mysqli_query($mysqli,$query1);
    $values = mysqli_fetch_assoc($result1);
    $num_rows = $values['total'];

  $result_transacoes = "SELECT classificacao, count(ID) AS numero FROM registros where ano='$anoconsulta' GROUP BY classificacao";
  $resultado_trasacoes = mysqli_query($mysqli, $result_transacoes);
  while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
    $html .= '<tr><td>'.$row_transacoes['classificacao'] . "</td>";
    $html .= '<td>'.$row_transacoes['numero'] . "</td>";
    $html .= '<td>'.$values['total'] . "</td></tr>";    
  }
  
  $html .= '</tbody>';
  $html .= '</table';

  
  //referenciar o DomPDF com namespace
  use Dompdf\Dompdf;

  // include autoloader
  require_once("dompdf/autoload.inc.php");

  //Criando a Instancia
  $dompdf = new DOMPDF();
  
  // Carrega seu HTML
  $dompdf->load_html('
      <img src="css/imagens/logo.png">
      <h1 style="text-align: center;">Relatório Anual</h1>
      '. $html .'
    ');

  //Renderizar o html
  $dompdf->render();

  //Exibibir a página
  $dompdf->stream(
    "relatorio.pdf", 
    array(
      "Attachment" => false //Para realizar o download somente alterar para true
    )
  );
?>

