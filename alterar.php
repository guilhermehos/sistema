<?php 

require ("config.php");
include ("inc_head.php");
include ("link_topo.php");
?>

<title>Registros</title>

</head>


<body>
  <div class="container"> 

    <h3>Editar</h3> 

    <?php

    $id = $_GET['id'];
    $select = $mysqli -> query("SELECT * FROM registros WHERE id='$id'");

    $dados  = $select->fetch_array(MYSQLI_ASSOC);

    $checkedf =explode(',', $dados['faixa']);
    $checkedl =explode(',', $dados['local']);
    $checkedp =explode(',', $dados['publico']);

    ?>

    <form id="form_registro" name="form_registro" method="post" enctype="multipart/form-data" action="atualizar.php">
      <div class="col-xs-12 form-group">
        <div class="col-xs-12">
          <input type="text" name="idevento" class="hidden" id="idevento" value="<?php echo "$id"?>"><br />
          <label for="reg_nome_ativ">Nome da Atividade:</label>
          <input name="reg_nome_ativ" type="text" class="form-control" id="reg_nome_ativ" size="100" value="<?php echo $dados['reg_nome_ativ']; ?>" />
        </div>
      </div>

      <div class="col-xs-12 form-group">
        <div class="col-xs-12">
          <label for="reg_breve_res">Breve Resumo da atividade:</label>
          <textarea name="reg_breve_res" cols="102" rows="5"  id="reg_breve_res" class="form-control" ><?php echo $dados['reg_breve_res']; ?></textarea>
        </div>
      </div>

      <div id="mesano" class="col-xs-12">
        <div id="mes" class="col-xs-12 col-sm-6 form-group">
          <label>Tipo de Atividade:</label>
          <select class="form-control" name="tipo" id="tipo">
            <option> <?php echo $dados['tipo']; ?></option>
            <option></option>
            <option>Cultura Digital</option>
            <option>CIS (Ações Culturais)</option>
            <option>Confraternização</option>
            <option>Congresso</option>
            <option>Curso</option>
            <option>Debate</option>
            <option>Ensaio</option>
            <option>Exposição</option>
            <option>Evento Externo</option>
            <option>Feira Cultural</option>
            <option>Fórum</option>
            <option>GPE CIS</option>
            <option>Montagem</option>
            <option>Mostra</option>
            <option>Oficina</option>
            <option>Oficinas Externas do CIS</option>
            <option>Outros</option>
            <option>Palestra</option>
            <option>Peça Teatral</option>
            <option>Rede Agro (Ações Culturais)</option>
            <option>Rede Agro (Sexta na Estação)</option>
            <option>Reunião</option>
            <option>Reunião Externa</option>
            <option>Seminário</option>
            <option>Show</option>
            <option>Visita Externa</option>
            <option>Visita Interna</option>
          </select>
        </div>

        <div id="ano" class="col-xs-12 col-sm-6 form-group">
          <label>Classificação:</label>
          <select class="form-control" name="classificacao" id="classificacao">
            <option> <?php echo $dados['classificacao']; ?></option>
            <option></option>
            <option>Cursos Ministrados</option> 
            <option>Espetáculos e Eventos Culturais</option>
            <option>Evento Cultural de Inclusão Social</option>
            <option>Eventos Externos</option>
            <option>Oficinas</option>
            <option>Oficinas em Parceria</option>
            <option>Palestras, Congresso e Seminários</option>
          </select>
        </div>
      </div>

      <div class="col-xs-12 col-sm-4 form-group">
        <label class="col-xs-12">Local onde ocorreu a atividade:</label>
        <div id="local" class="checkbox col-xs-12">
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Armazem do Cafe (salao maior)" <?php in_array('Armazem do Cafe (salao maior)', $checkedl) ? print "checked": ""; ?> />Armazém do Café (salão maior)
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Armazem do Cafe (salao menor)" <?php in_array('Armazem do Cafe (salao menor)', $checkedl) ? print "checked": ""; ?>/>Armazém do Café (salão menor) 
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Galeria I" <?php in_array('Galeria I', $checkedl) ? print "checked": ""; ?>/>Galeria I
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Galeria II" <?php in_array('Galeria II', $checkedl) ? print "checked": ""; ?>/>Galeria II
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Gare" <?php in_array('Gare', $checkedl) ? print "checked": ""; ?>/>Gare
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Sala Multiuso I" <?php in_array('Sala Multiuso I', $checkedl) ? print "checked": ""; ?>/>Sala Multiuso I
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Sala Multiuso II" <?php in_array('Sala Multiuso II', $checkedl) ? print "checked": ""; ?>/>Sala Multiuso II
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"   value="Espaço de Cultura Digital" <?php in_array('Espaço de Cultura Digital', $checkedl) ? print "checked": ""; ?>/>Espaço de Cultura Digital
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"  value="Sala de Reunioes" <?php in_array('Sala de Reunioes', $checkedl) ? print "checked": ""; ?>/>Sala de Reuniões
          </label>
          <label class="col-xs-12">
            <input type="checkbox" name="l[]"  value="Estacionamento" <?php in_array('Estacionamento', $checkedl) ? print "checked": ""; ?>/>Estacionamento
          </label>
          <label class="col-xs-12">
           <input type="checkbox" name="l[]"  value="Outro" <?php in_array('Outro', $checkedl) ? print "checked": ""; ?>/>Outro
         </label>
         <input name="outrolocal" type="text" class="form-control" id="outrolocal" size="26" value="<?php echo $dados['outrolocal']; ?>"/>
       </div>
     </div>


     <div class="col-xs-12 col-sm-4 form-group">
       <label class="col-xs-12">Faixa etária do público:</label>
       <div id="faixa" class="checkbox col-xs-12">
        <label class="col-xs-12">
          <input type="checkbox" name="f[]"   value="Até 7 anos" <?php in_array('Até 7 anos', $checkedf) ? print "checked": ""; ?>/> Até 7 anos
        </label> 
        <label class="col-xs-12">
          <input type="checkbox" name="f[]"   value="De 8 a 12 anos" <?php in_array('De 8 a 12 anos', $checkedf) ? print "checked": ""; ?>/>De 8 a 12 anos
        </label> 
        <label class="col-xs-12">
          <input type="checkbox" name="f[]"   value="De 13 a 17 anos" <?php in_array('De 13 a 17 anos', $checkedf) ? print "checked": ""; ?>/>De 13 a 17 anos
        </label>
        <label class="col-xs-12">
          <input type="checkbox" name="f[]"   value="Maiores de 18 anos" <?php in_array('Maiores de 18 anos', $checkedf) ? print "checked": ""; ?> />Maiores de 18 anos
        </label>
        <label class="col-xs-12">
          <input type="checkbox" name="f[]"    value="Terceira idade" <?php in_array('Terceira idade', $checkedf) ? print "checked": ""; ?> />Terceira idade
        </label>
      </div>
    </div>

    <div class="col-xs-12 col-sm-4 form-group">
      <label class="col-xs-12">Tipo de público:</label>
      <div id="publico" class="checkbox col-xs-12">
        <label class="col-xs-12">
          <input type="checkbox" name="p[]"  value="Geral" <?php in_array('Geral', $checkedp) ? print "checked": ""; ?>/>Geral
        </label> 
        <label class="col-xs-12">
          <input type="checkbox" name="p[]"  value="Instituicao" <?php in_array('Instituicao', $checkedp) ? print "checked": ""; ?>/>Instituição
        </label>
      </div>
    </div>

    <div class="col-xs-12" id="mesano">
      <div id="mes" class="col-xs-6 col-sm-4 col-md-2 form-group">
        <label>Mês da Atividade:</label>
        <select class="form-control" name="mes" id="mes">
          <option> <?php echo $dados['mes']; ?></option>
          <option></option>
          <option>JANEIRO</option>
          <option>FEVEREIRO</option>
          <option>MARÇO</option>
          <option>ABRIL</option>
          <option>MAIO</option>
          <option>JUNHO</option>
          <option>JULHO</option>
          <option>AGOSTO</option>
          <option>SETEMBRO</option>
          <option>OUTUBRO</option>
          <option>NOVEMBRO</option>
          <option>DEZEMBRO</option>
        </select>
      </div>

      <div id="ano" class="col-xs-6 col-sm-4 col-md-2 form-group">
        <label>Ano da Atividade:</label>
        <select class="form-control" name="ano" id="ano">
          <option> <?php echo $dados['ano']; ?></option>
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
        </select></div>

        <div id="mes" class="col-xs-6 col-sm-4 col-md-2 form-group">
          <label for="data_inicial">Data inicial: </label>
          <input type="text" class="form-control" name="data_inicial" id="data_inicial" value="<?php echo $dados['data_inicial']; ?>"/></p>
          <script type="text/javascript" src="../js/external/jquery/jquery.js"></script>
          <script type="text/javascript" src="../js/jquery-ui.js"></script>
          <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
          <script type="text/javascript" src="../js/ui.js"></script>
          <script type="text/javascript" src="../js/datepicker-pt-BR.js"></script>
        </div>

        <div id="ano" class="col-xs-6 col-sm-4 col-md-2 form-group">
         <label class="co-xs-12" for="data_final">Data final: </label><input type="text" class="form-control" name="data_final" id="data_final" value="<?php echo $dados['data_final']; ?>"/></p>
         <script>
          $(function() {
            $( "#data_final" ).datepicker({
            });
          });
        </script>
      </div>

      <div id="mes" class="col-xs-6 col-sm-4 col-md-2 form-group">
        <label for="hora_inicial">Horário inicial: </label>
        <input class="form-control" type="time" name="hora_inicial" id="hora_inicial" value="<?php echo $dados['hora_inicial']; ?>"/></p>
      </div>

      <div id="ano" class="col-xs-6 col-sm-4 col-md-2 form-group"> 
        <label for="hora_final">Horário final: </label>
        <input class="form-control" type="time" name="hora_final" id="hora_final" value="<?php echo $dados['hora_final']; ?>"/></p>
      </div>
    </div>

    <div class="col-xs-12">
      <div class="col-xs-6 form-group">
        <label for="reg_responsavel">Responsável:</label>
        <input name="reg_responsavel" type="text" class="form-control" id="reg_responsavel" size="100" value="<?php echo $dados['reg_responsavel']; ?>" />
      </div>
      <div class="col-xs-6 form-group">
        <label for="proponente">Proponente:</label>
        <input name="proponente" type="text" class="form-control" id="proponente" size="100" value="<?php echo $dados['proponente']; ?>"/>
      </div>
    </div>

    <div class="col-xs-12">
      <div class="col-xs-12 col-sm-6 form-group">
        <label for="pub_previsto">Público previsto:</label><!-- <input name="pub_previsto" type="text" class="form-control" id="pub_previsto" size="100" />  -->

        <input type="range" name="pub_previsto" min="0" max="5000" value="0" id="pub_previsto" step="1"  onchange="showValue(this.value)" />
        <script type="text/javascript">
         function showValue(number)
         {
          document.getElementById("put").innerHTML = number;

        }
      </script>
      <span id="put">0</span>
    </div>

    <div class="col-xs-12 col-sm-6 form-group">
      <label for="pub_efetivo">Público efetivo:</label><!--<input name="pub_efetivo" type="text" class="form-control" id="pub_efetivo" size="100" />  -->

      <input type="range" name="pub_efetivo" min="0" max="5000" value="0" id="pub_efetivo" step="1"  onchange="showValue2(this.value)" />
      <script type="text/javascript">
       function showValue2(number)
       {
        document.getElementById("put2").innerHTML = number;

      }
    </script>
    <span id="put2">0</span>
  </div>
</div>


<div class="col-xs-12">
  <div class="col-xs-12 form-group">
    <label for="imagem">Selecione imagens: <font color="#999999"> ( Imagens sobre o evento )</font></label><input name="imagem[]" type="file" id="imagem" multiple />
  </div></div>

  <div class="col-xs-12 form-group">

    <input type="submit" class="btn bgColor1 bgHover2 center-block" value="Atualizar" name="button"/>
  </div>
</form>

</div>
</body>
</html>

<!-- <?php
	if (isset($_POST["button"])) {
		
		$reg_nome_ativ = mysqli_real_escape_string($mysqli,$_POST["reg_nome_ativ"]);
		$reg_breve_res = mysqli_real_escape_string($mysqli,$_POST["reg_breve_res"]);
		$tipo = mysqli_real_escape_string($mysqli,$_POST["tipo"]);
		$classificacao = mysqli_real_escape_string($mysqli,$_POST["classificacao"]);
		$mes = mysqli_real_escape_string($mysqli,$_POST["mes"]);
		$ano = mysqli_real_escape_string($mysqli,$_POST["ano"]);
		$data_inicial = mysqli_real_escape_string($mysqli,$_POST["data_inicial"]);
		$data_final = mysqli_real_escape_string($mysqli,$_POST["data_final"]);
		$hora_inicial = mysqli_real_escape_string($mysqli,$_POST["hora_inicial"]);
		$hora_final = mysqli_real_escape_string($mysqli,$_POST["hora_final"]);
		$reg_responsavel = mysqli_real_escape_string($mysqli,$_POST["reg_responsavel"]);
		$proponente = mysqli_real_escape_string($mysqli,$_POST["proponente"]);
		$pub_previsto = mysqli_real_escape_string($mysqli,$_POST["pub_previsto"]);
		$pub_efetivo = mysqli_real_escape_string($mysqli,$_POST["pub_efetivo"]);
		$outrolocal = mysqli_real_escape_string($mysqli,$_POST["outrolocal"]);
		
		// FAIXA, LOCAL E TIPO DE PUBLICO...
		$l = implode(",",$_POST['l']);
		
		$f = implode(",",$_POST['f']);
		
		$p = implode(",",$_POST['p']);
		
		// Imagem upload
			//INFO IMAGEM
		$file 		= $_FILES['imagem'];
		$numFile	= count(array_filter($file['name']));

			//PASTA
		$folder  = 'fotos/';

			//REQUISITOS
		$permite =  array('image/jpeg', 'image/png');
		$maxSize = 1024 * 1024 * 20;

			//MENSAGENS
		$msg 	  = array();
		$errorMsg = array(
			1 => 'Muitas imagens selecionadas, ultrapassando o limite de tamanho',
			2 => 'O arquivo ultrapassa o tamanho permitido',
			3 => 'O upload do arquivo foi feito parcialmente',
			4 => 'Não foi feito o upload do arquivo'
			);

		for ($i = 0; $i < $numFile; $i++){
			$name  = $file['name'][$i];
			$type  = $file['type'][$i];
			$size  = $file['size'][$i];
			$error = $file['error'][$i];
			$tmp   = $file['tmp_name'][$i];

			$extensao  = @end(explode('.', $name));
			$novo_nome = md5(time()).".$extensao";

			if ($error != 0)
				$msg[] = "<b>$name :</b>".$errorMsg[$error];
			else if (!in_array($type, $permite))
				$msg[] = "<b>$name :</b> Erro imagem não suportada!";
			else if ($size > $maxSize)
				$msg[] = "<b>$name :</b> Erro imagem ultrapassa limite permitido!";
			else{

				if(move_uploaded_file($tmp, $folder."/".$novo_nome))
					$msg[] = "<b>$name :</b> Desculpe ocorreu algum erro..";
			}

		}

     $id = $_GET['id'];

        
		}
	
?> -->

<?php 
include ("footer.php");
?>

