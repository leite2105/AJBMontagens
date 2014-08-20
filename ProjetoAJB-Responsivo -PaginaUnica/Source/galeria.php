<?php
// ====================================================
// Autor: Nilton Cesar Do Amaral Junior
// Data: 15/08/2014
// Funcionalidade: Mostrar galeria
// Arquivo: galeria.php
// ======================================================

	include_once("Classes/Conexao.class.php");
	include_once("Classes/Midia.class.php");
	
	$Conexao = new Conexao();
	$Midia = new Midia($codigoMidia,$descricaoMidia,$nomeArquivo,$enderecoMidia,$dataMidia);
?>

<html>
	<head>
		<title>Galeria</title>
	</head>
	
	<body>
		<div id="galeria">
			<h1>Galeria</h1>
			<?php
				$Midia->mostrarGaleria();
			?>
		</div>
	</body>
</html>