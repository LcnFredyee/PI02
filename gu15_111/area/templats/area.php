 <!DOCTYPE html> 
<html lang="pt-br">
	<head>
		<link rel="icon" type="image/png" sizes="16x16" href="../img/logopag.png">
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
			<!-- Campo das mensagem -->
			<div id="msg">
				<p>
					<!-- Corrigir depois	 -->
					<?php echo $msg; ?>
				</p>
			</div>

			<section id="form-content">
			<!--------- paginação --->
		
				<h3>Cadastro da área</h3>

				<!-- Campo de pesquisa -->	
				<form id="frma" action="" method="get">
					<!--- caso uma pesquisa seja feita, o botão de voltar será habilitado -->
					<?php 
						if(isset($_GET['pesq'])) {
							if (!empty($_GET['pesq'])) {
								echo "<input type='text' name='pesq' id='pesq' value='".$pesquisa."'>";
								//$butt recebe o botão btnVoltar, botão cujo papel é dar refresh na pagina
								echo $butt;
							}
						}else{
							echo '<input type="text" name="pesq" id="pesq" placeholder="Pesquisar descrição ...">';
							
						}
					?>
					<input type="submit" id="btnPesquisar" value="Pesquisar"/>
				</form>
				<form id="frma" action=""  method="post">
					<input type="submit" id="btnNovo" class="btnNovo" name="btnNovo" value="Incluir" /> 
				</form>
				
				<!--- campo de inclusão -->
			</section><!-- form-content - Fim -->
			<div id="area-content">
				<table>
					<thead>
						<tr>
							<td class="cmcodigo"><strong>Codigo</strong></td>
							<td class="cmdescricao"><strong>Area</strong></td>
							<td class="cmdescricao"><strong>Quantidade de assuntos [Clique]</strong></td>
							<td colspan="2"><strong>Ações</strong></td>
						</tr>
					</thead>
					<tfoot>
					<?php 

						echo " <ul id='tablet'> ";
							do{
								$i++;
								echo " <li>";
										if(isset($_GET['pesq'])){
											echo "<a href='?pg=$i&pesq=".$_GET['pesq']."'>$i</a>";
										}else{
											echo "<a href='?pg=$i'>$i</a>";
										}
								echo "</li>";					
							}while($i < $numPagina);
							
						echo "</ul>";
					?>
					</tfoot>
					<tbody>
						<?php 
						if($num > 0){
							foreach($areas as $campo => $value){
								echo "
									<tr>
										<td class='cmcodigo'>{$campo}</td>
										<td class='cmdescricao'>{$value['descricao']}</td>
										<td class='cmdescricao'><a href='../assunto/?pesq={$value['descricao']}'>{$value['AssuntoArea']}</a></td>
										<td><a href='?dcod={$campo}' class='adel'>Deletar</a></td>
										<td><a href='?ecod={$campo}' class='aedit' class='lightbox'>Editar</a></td>
									</tr>" ;
							}
						}else{
							echo " 	<tr>
										<td colspan='5'><center>Nenhum resultado encontrado</center></td>
									</tr>";
						}
						?>
					</tbody>
				</table>
		</div><!-- frmarea - Fim -->
		</div><!-- area-content - Fim -->

		<!---- scripts ---->
		<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../js/scripts.js"></script>
	</body>
</html>