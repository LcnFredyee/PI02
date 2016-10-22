<?php
	$resultado = " ";
	if(filter_input(INPUT_POST, "btnSubmit")){
		if($_FILES["flArquivo"] != null){
			$pasta = "";
			$tipoArquivo = "";
			if(filter_input(INPUT_POST, "slTipoArquivo") == 1){
				$pasta = "arquivos";
				$tipoArquivo = "file";
			}else{
				$pasta = "imagens";
				$tipoArquivo = "img";
			}
			
			require_once("upload.php");
			$upload = new Upload();
			
			$nomeArquivo = $upload->LoadFile($pasta, $tipoArquivo, $_FILES["flArquivo"]);
			
			if($nomeArquivo != ""){
				$resultado = "Arquivo carregado com sucesso!";
			}else{
				$resultado = "Houve um erro ao tentar carregar arquivo!";
			}
		}else{
			$resultado = "Escolha um arquivo!";
		}
	}
?>

<!doctype html>
<html lang="pt-br">
	<head>
		<title>Upload File SatellaSoft</title>
		<meta charset="utf-8" />
		<style>
			*{
				margin: 0 auto;
				padding: 0;
			}
			
			p{
				padding: 10px;
			}
			
			#dvCentro{
				margin-top: 10%;
				background-color: #eee;
				padding: 6px;
				width: 100%;
				max-width: 600px;
			}
		</style>
	</head>
	
	<body>
		<div id="dvCentro">
			<form method="post" name="frmUpload" enctype="multipart/form-data">
				<p>Selecione o arquivo<input type="file" name="flArquivo" id="flArquivo" /></p>
				<p>Selecione o tipo
					<select name="slTipoArquivo" id="slTipoArquivo">
						<option value="1" selected>Arquivo</option>
						<option value="2">Imagem</option>
					</select>
				</p>
				<output id="list"></output>
				<br />
				<input type="submit" name="btnSubmit" value="Carregar" />
				<span><?=$resultado;?></span>
			</form>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded", function(){
					
				document.getElementById('flArquivo').addEventListener('change', handleFileSelect, false);
					
				function handleFileSelect(evt) {
					if(document.getElementById("slTipoArquivo").value == 2){ //Tira esta linha
							document.getElementById('list').innerHTML = "";
							var files = evt.target.files; // FileList object
							for (var i = 0, f; f = files[i]; i++) {

								if (!f.type.match('image.*')) {
									continue;
								}

								var reader = new FileReader();

								// Closure to capture the file information.
								reader.onload = (function (theFile) {
									return function (e) {
										// Render thumbnail.
										var span = document.createElement('span');
										span.innerHTML = ['<img style="max-width:250px; width: 100%;" data-caption="Imagem de pré visualização" class="thumb responsive-img materialboxed" src="', e.target.result,
											'" title="', escape(theFile.name), '"/>'].join('');
										document.getElementById('list').insertBefore(span, null);
									};
								})(f);

								// Read in the image file as a data URL.
								reader.readAsDataURL(f);
							}
					}//Tira esta linha
            }
			
			}, false);
		</script>
	</body>
</html>