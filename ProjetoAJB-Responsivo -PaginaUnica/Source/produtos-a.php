<?php
/* ====================================
Autor: Nilton Cesar Do Amaral Junior
Data: 13/08/2014
Arquivo: produtos-a.php
===================================*/
	require_once("Funcoes/validaSessao.php");

	include_once("Classes/Conexao.class.php");
	include_once("Classes/Produto.class.php");
	$Conexao = new Conexao();
	$Produto = new Produto($codigoProduto,$descricaoProduto,$precoMetroQuadradoProduto);
	
	if (isset($_GET['cp'])) {
		$cp = $_GET['cp'];
		$Produto->setCodigoProduto($cp);
	}
	
	if ($Produto->povoarCampos()) {
	
		$codigoProduto = $Produto->getCodigoProduto();
		$descricaoProduto = $Produto->getDescricaoProduto();
		$precoMetroQuadradoProduto = $Produto->getPrecoMetroQuadradoProduto();
	
	}
?>
<!DOCKTPE html>
<html>
	<head>
		<title> Alteração de produtos</title>
		
		<!-- Envio do formulario com Ajax e validação-->
		<script>
			$(document).ready(function(){
				//Validação com validate.js
				$("#formAlteracaoProduto").validate({
				
					rules:{					
												
						descricaoProduto:{
							
							required: true
						},
						
						precoMetroQuadradoProduto:{
							required: true
						}
						
					}, 
					messages: {
					
						descricaoProduto:{
					
							required: "Preencha a descrição do produto!"
						},
						
						precoMetroQuadradoProduto: {
							required: "Preencha o preço do produto!"
						}
					},
					submitHandler: function( form ){ //Pega pelo id do Form, quando o botão submit for clicado
					
						//Função que verifica os dados vindos do submit e guarda na variavel DADOS
						var dados = $( form ).serialize();
						
						$.ajax({
							//Manda o método que é POST para a URL indicada
							type: "POST",
							url: "produtos-p.php?acao=3&cp=<?php echo $cp;?>",
							data: dados,
							success: function() {
							
								//Cria a mensage de dados cadastrados com sucesso
								var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
								
								//Joga a mensagem na tela
								document.getElementById('mensagem').innerHTML = mensagem;
								//Apaga o texto inserido no campo
								document.getElementById('descricaoProduto').value = "";
								document.getElementById('precoMetroQuadradoProduto').value = "";
								
								$("#mensagem").show();
								
								
								setTimeout(function() {
									$('#mensagem').hide();
									}, 
								2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
							}
							
						});
						
						return false;
					}
			});	
		});
		</script>
	</head>
	
	<body>
		<div id="formularios">
			<form action="" method="POST" id="formAlteracaoProduto">
				<span class="tituloFormulario">Alteração de produtos</span>
				
				<table id="tabelaFormulario">
					
					<tbody>
						<tr>
							<td><label>Descrição:</label></td>
							<td><input type="text" name="descricaoProduto" value="<?php echo $descricaoProduto; ?>" id="descricaoProduto" title="Informe a descrição do produto" placeholder="Informe a descrição do produto"></td>
						</tr>
						
						<tr>
							<td><label>Preço:</label></td>
							<td>R$ <input type="text" name="precoMetroQuadradoProduto" value="<?php echo $precoMetroQuadradoProduto; ?>" id="precoMetroQuadradoProduto" title="Informe o preço do metro quadrado deste produto" ></td>
						</tr>
						<tr>
							<td><input type="submit" value="Alterar" id="submitProdutos" title="Alterar informações"></td>
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