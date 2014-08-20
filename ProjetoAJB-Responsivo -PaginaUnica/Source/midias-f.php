<?php
/* ====================================
Autor: Nilton Cesar Do Amaral Junior
Data: 12/08/2014
Arquivo: midias-f.php
===================================*/
	require_once("Funcoes/validaSessao.php");
?>
<!DOCKTPE html>
<html>
	<head>
		<title> Cadastro de mídias</title>
	</head>
	
	<body>
		<div id="formularios">
			<form action="administracao.php?pag=midias-p.php" method="POST" id="formMidia" enctype="multipart/form-data">
				<span class="tituloFormulario">Cadastro de mídias</span>
				
				<table id="tabelaFormulario">

					<tbody>
						<tr>
							<td><label>Descrição:</label></td>
							<td><textarea name="descricaoMidia" id="descricaoMidia" required title="Informe a descrição da mídia" placeholder="Informe a descrição da mídia"></textarea></td>
						</tr>
						
						<tr>
							<td><label>Mídia:</label></td>
							<td><input type="file" name="arquivo" required title="Escolha a mídia desejada" ></td>
						</tr>
						<tr>
							<td><input type="submit" value="Cadastrar" id="submitMidias" title="Cadastrar informações"></td>
						</tr>
						
						<tr>
							<td colspan="2">
								<div id="mensagem">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body>
</html>