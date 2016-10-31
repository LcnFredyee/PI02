<!DOCTYPE html> 
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<meta html lang="pt-br">
		<meta charset='UTF-8'>
		<title>Formulario envio de imagem</title>
		
		<script language="javascript" type="text/javascript">
			
			
		</script>
	</head>
		
	<body>
		
		<form  action="upload.php" method="post" enctype="multipart/form-data">  

			<label for="foto">Envie seu <strike>Nudes</strike> </label><br><br><br> 
			
			
			<input type="file"  name="foto" ><br><br>
			
			
			
			<input type="submit" value="Enviar Foto!"> 
			
			
		</form>


		
	
		
	</body>
</html>
<!--Conexão com o banco de dados-->
<?php
		$dbhost = "IP ou nome do servidor";
		$db = "nome do banco";
		$user = "user@servidor";
		$password = "Senha";
		$dsn = "Driver={SQL Server};Server=$dbhost;Port=1433;Database=$db;";
					   
		$connect = odbc_connect($dsn,
								$user,
								$password);
		$q = odbc_exec($connect,'SELECT * FROM Cliente');
		echo "<pre>";
		while($r = odbc_fetch_array($q)){
			print_r($r);
		}
		echo "</pre>";
		var_dump($connect);
?>