 <!DOCTYPE html> 
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<meta html lang="pt-br">
		<meta charset='UTF-8'>
		<title>Estrutura - PI II</title>
	</head>
	
	<body>
		
		<?php // Cabeçalho
			include "../menuCruds.php";
		?>

		<div id="frmarea">
			<!----- COMEÇO DO LIGHTBOX ------------------->
			<div class="background"></div>
			<div class="box">
			<div><img src="imagens/close.png" class="close" ></div>
				<div id="crudArea">
					<form id="frmarea-crud" method="post">
						<label class="label-default">Descrição</label>
						<input type="text" name="txtDescricao" <?php echo "value='{$result['descricao']}'";?> class="style-input-default"/>
						<input type="submit" name="btnEnviar" class="btArea" value="Enviar" />
					</form>	
				</div>
			</div>
			<!---------------------------- FIM LIGHTBOX---------------->
			<!-- Campo das mensagem -->
			<div id="msg">
				<p>
					<!-- Corrigir depois	 -->
					<?php echo $msg; ?>
				</p>
			</div>

			<section id="form-content">
				<h3>Cadastro da área</h3>

				<!-- Campo de pesquisa e inclusão -->	
				<form id="frma" action=""  method="post">
							<!--- caso uma pesquisa seja feita, o botão de voltar será habilitado -->
					<?php 
						if(isset($_POST['btnPesquisar'])) {
							if (!empty($_POST['txtPesquisa'])) {
								echo "<input type='text' name='txtPesquisa' id='txtPesquisa' value='".$pesquisa."'>";
								echo $butt;
							}
						}else{
							echo '<input type="text" name="txtPesquisa" id="txtPesquisa" placeholder="Pesquisar descrição ...">';
						}
					?>
			
						
					<input type="submit" id="btnNovo" class="btnNovo" name="btnNovo" value="Incluir"> 
				</form>
			</section><!-- form-content - Fim -->

			<div id="area-content">
				<table>
					<thead>
						<tr>
							<td class="cmcodigo"><strong>Codigo</strong></td>
							<td class="cmdescricao"><strong>Descricao</strong></td>
							<td colspan="2"><strong>Ações</strong></td>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($areas as $campo => $value){
								echo "
									<tr>
										<td class='cmcodigo'>{$campo}</td>
										<td class='cmdescricao'>{$value}</td>
										<td><a href='#' class='lightbox' class='adel'>Deletar</a></td>
										<td><a href='?ecod=$campo' class='lightbox' class='aedit'>Editar</a></td>
									</tr>" ;
							}
						?>
					</tbody>
				</table>
			</div><!-- area-content - Fim -->
		</div><!-- frmarea - Fim -->
		<!---- scripts ---->
		<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../js/lightbox.js"></script>
	</body>
</html>