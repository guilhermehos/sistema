<?php 

require ("config.php");
include ("inc_head.php");
include ("seguranca.php");
?>

<?php

$id = $_POST['idevento'];
$reg_nome_ativ = $_POST['reg_nome_ativ'];
$reg_breve_res = $_POST['reg_breve_res'];
$tipo = $_POST['tipo'];
$classificacao = $_POST['classificacao'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$data_inicial = $_POST['data_inicial'];
$data_final = $_POST['data_final'];
$hora_inicial = $_POST['hora_inicial'];
$hora_final = $_POST['hora_final'];
$reg_responsavel = $_POST['reg_responsavel'];
$proponente = $_POST['proponente'];
$pub_previsto = $_POST['pub_previsto'];
$pub_efetivo = $_POST['pub_efetivo'];
$outrolocal = $_POST['outrolocal'];
/*$local = implode(",",$_POST['l']);
$faixa = $_POST['checkedf'];
$publico = $_POST['checkedp'];*/
$imagem = $_POST['imagem'];
$data_img = $_POST['data_img'];

	 $insert = $mysqli->query ("UPDATE registros SET reg_nome_ativ = '$reg_nome_ativ', reg_breve_res = '$reg_breve_res', tipo = '$tipo', classificacao = '$classificacao', mes = '$mes', ano = '$ano', data_inicial = '$data_inicial', data_final = '$data_final', hora_inicial = '$hora_inicial', hora_final = '$hora_final', reg_responsavel = '$reg_responsavel', proponente = '$proponente', pub_previsto = '$pub_previsto', pub_efetivo = '$pub_efetivo', outrolocal = '$outrolocal', /*local = '$l', faixa = '$f', publico = '$p',*/ imagem = '$novo_nome', data_img = NOW() WHERE id='$id' ");

      if ($insert) {
        echo "<script> alert ('Atualizado com sucesso!'); location.href='registrado.php' </script>";
      } else {
        echo $mysqli->error;
      }
