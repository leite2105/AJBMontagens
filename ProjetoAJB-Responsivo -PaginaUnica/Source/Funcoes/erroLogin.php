<?php ob_start();
//========================================
// Autor: NIlton Cesar Do Amaral Junior
// Data: 14/08/2014
// Funcionalidade: Mensagem de erro ao se logar erroneamente
// Arquivo: erroLogin.php
//=========================================

?>

<html>
	
	<head>	
		
		<title>Erro!</title>
		<meta charset="UTF-8">
	</head>
	
	<body>
		<div id="erroLogin">
			<?php
				echo "<script>";
				echo "alert('Senha ou nome de usuário incorreto! Tente novamente');";
				echo "location.href='login.php'";
				echo "</script>";
			?>
		</div>
	</body>

</html>