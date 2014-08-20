<?php
// =======================================
// Autor: NIlton Cesar Do Amaral Junior
//Data: 12/08/2014
// Funcionalidade: Formulario para organizar as consultas
// Arquivo: consultas-f.php
//================================================

	require_once("Funcoes/validaSessao.php");
?>
<html>
	<head>
		<title>Consultas de informações</title>
	</head>
	
	<body>
		<form action="administracao.php?pag=consultas-c.php" method="POST" name="formConsultas">
			<table id="tabelaEscolhaConsulta">
				<tr>
					<td><label id="Escolha">Escolha uma opção:</label></td>
					<td><select name="consultaEscolhida" id="escolhaConsulta">
							<option value="">Selecione</option>
							<option value="F">Funcionários</option>
							<option value="M">Mídias</option>
							<option value="P">Produtos</option>
						</select></td>
				</tr>
				
				<tr>
					<td><input type="submit" id="submitConsulta" title="Consultar informação" value="Enviar"></td>
				</tr>
			</table>
		</form>
	</body>
</html>