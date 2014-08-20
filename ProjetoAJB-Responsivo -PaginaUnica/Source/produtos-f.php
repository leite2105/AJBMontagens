<?php
/* ====================================
Autor: Nilton Cesar Do Amaral Junior
Data: 12/08/2014
Arquivo: produtos-f.php
===================================*/
	require_once("Funcoes/validaSessao.php");
?>
<!DOCKTPE html>
<html>
	<head>
		<title> Cadastro de produtos</title>
	</head>
	
	<body>
		<div id="formularios">
			<form action="" method="POST" id="formProduto">
				<span class="tituloFormulario">Cadastro de produtos</span>
				
				<table id="tabelaFormulario">
					
					<tbody>
						<tr>
							<td><label>Descrição:</label></td>
							<td><input type="text" name="descricaoProduto" id="descricaoProduto" title="Informe a descrição do produto" placeholder="Informe a descrição do produto"></td>
						</tr>
						
						<tr>
							<td><label>Preço:</label></td>
							<td>R$ <input type="text" name="precoMetroQuadradoProduto" id="precoMetroQuadradoProduto" title="Informe o preço do metro quadrado deste produto" ></td>
						</tr>
						<tr>
							<td><input type="submit" value="Cadastrar" id="submitProdutos" title="Cadastrar informações"></td>
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