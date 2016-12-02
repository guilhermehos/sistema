<?php

	require ("config.php");
  require ("panel/protect.php");
  include ("inc_head.php");
  include ("link_topo.php");
	
?>

<title>Detalhes</title>

</head>


<?php

  $id = $_GET['id'];
  $select = $mysqli -> query("SELECT * FROM registros WHERE id='$id'");
  $numTotal = $select->num_rows;
  $dados = $select->fetch_assoc();

  $nomeimg = $dados['imagem'];

?>

<body>
          <div class="container">
              <div class="row">
               
                <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                  <thead>
                  <tr class="active">
                      <th align-text="center">DETALHES</th>

                  </tr>
                      </thead>
                            
                      <tbody>
                      <tr>
                      <td>
                      <?php echo "Nome da Atividade: " .$dados['reg_nome_ativ']. "<br />"?>
                      <?php echo "Resumo da Atividade: " .$dados['reg_breve_res']. "<br />"?>
                     
                      
                      <?php echo "Tipo de Atividade: " .$dados['tipo']. "<br />"?> 
                      <?php echo "Classificação (PREAC): " .$dados['classificacao']. "<br />"?> 
                      <?php echo "Local (cis): " .$dados['local']. "<br />"?> 
                      <?php echo "Outro local: " .$dados['outrolocal']. "<br />"?> 
                      <?php echo "Faixa etária: " .$dados['faixa']. "<br />"?> 
                      <?php echo "Tipo de público: " .$dados['publico']. "<br />"?>
                      <?php echo "Mês: " .$dados['mes']. "<br />"?> 
                      <?php echo "Ano: " .$dados['ano']. "<br />"?>
                      <?php echo "Data inicial: " .$dados['data_inicial']. "<br />"?> 
                      <?php echo "Data final: " .$dados['data_final']. "<br />"?> 
                      <?php echo "Horário inicial: " .$dados['hora_inicial']. "<br />"?> 
                      <?php echo "Horário final: " .$dados['hora_final']. "<br />"?> 
                      <?php echo "Responsável: " .$dados['reg_responsavel']. "<br />"?> 
                      <?php echo "Proponente: " .$dados['proponente']. "<br />"?> 
                      <?php echo "Público previsto: " .$dados['pub_previsto']. "<br />"?> 
                      <?php echo "Público efetivo: " .$dados['pub_efetivo']. "<br />"?> 
                      <?php echo "Nome das imagens: " .$dados['imagem']. "<br />"?> 
                      <?php if ($nomeimg == "") {
                        echo "Este evento não tem imagens salvas! <br />";
                      } else { 
                        echo '<img src="fotos/' .$nomeimg.'" height="100" width="100"/> <br />';
                            }
                        echo "ID do usuário criador: " .$dados['iduser']. "<br />";
                  

                      if ($idrec == $dados['iduser']) {
                        echo "<a href=alterar.php?id=$id><button class='btn-group btn-warning btn-xs pull-left col-xs-1'>  Editar  </button></a>";
                        echo "<button onclick='desejaApagar()' class='btn-group btn-danger btn-xs pull-left col-xs-1'>  Apagar  </button>";
                          
                          }else {
                            
                        echo "Você não pode alterar este registro!";
                        }

                        ?>
                        </td>
                        </tr>
                     
                      </tbody>
                      </table>
</div>
</div>
          
<script> 
                
var idapaga = "<?php print $id; ?>";

                function desejaApagar() {
                  
                        if(confirm('Realmente deseja apagar este evento?')) {
                            window.location = "apagar.php?id="+idapaga;
                        } else {
                            alert('Cancelado!');
                                }
                          };

          </script>
<?php 
include ("footer.php");
?>



