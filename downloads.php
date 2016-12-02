<?php

	require ("config.php");
	require ("panel/protect.php");
  include ("inc_head.php");
  include ("link_topo.php");	
?>


<title>Downloads</title>
</head>

<body>
<div class="container">
        <div class="row">
            	  <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                                   
                                     
                                 <thead>
                                 <tr>
                                     <th align-text="center">DOWNLOADS</th>
               
                                 </tr>
                                     </thead>  
                                 
                                </table> 
                                <!-- <div id="Down" class="form bradius"> 
                                <form id="form_down" name="form_login" method="post" action="">
                                <label for="num_registro">Digite o numero de registro do evento: </label><input  id="id_registrado" type="text" class="txt bradius" name="id_registrado" value="" />
                                                               <input type="submit" class="sb bradius" value="Enviar" name="button"/>
                                                               </form> -->

                               <form class="navbar-form navbar-left" role="search" id="form_down" name="form_login" method="post" action="">
                                  <div class="form-group">
                                  <label for="num_registro">Digite o numero de registro do evento: </label>
                                  <input id="id_registrado" name="id_registrado" type="text" class="form-control" placeholder="15" value="">
                                  <input type="submit" class="btn btn-default" value="Enviar" name="button">
                                  </div>
                                      
                              </form>
                 </div>
                 <?php
                  if (isset($_POST["button"])) {
                    $id_registrado = mysqli_real_escape_string($mysqli, $_POST["id_registrado"]);
                    
                    if($id_registrado == "") {
                      echo "<script> alert('Preencha o registro!'); </script>";
                      return true;
                    }
                    
                    $select = $mysqli->query("SELECT * FROM registros WHERE id='$id_registrado'");
                    $numTotal = $select->num_rows;
                    $dados = $select->fetch_assoc();

                    $nomeimg = $dados['imagem'];
                    
                      echo "Nome da Atividade: " .$dados['reg_nome_ativ']. "<br />";
                      if ($dados['imagem'] == "") {
                        echo "Este evento não tem imagens salvas!";
                      }else {
                        echo "Nome das imagens: " .$dados['imagem']. "<br />"; 
                        echo '<img src="fotos/' .$nomeimg.'" height="100" width="100"/>';
                        echo "<a href='fotos/$nomeimg' download='fotos/$nomeimg'>Download</a>"; 
                     }

                      if ($numTotal == 0){ 
                        echo "<script> alert('Registro não existe!'); </script>";
                        }  

                      }
                  ?>
              </div>
    
</body>
</html> 

<?php 
include ("footer.php");
?>



