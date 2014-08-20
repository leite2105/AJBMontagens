<?php
/* ====================================
Autor: Nilton Cesar Do Amaral Junior
Data: 13/08/2014
Arquivo: funcionarios-a.php
===================================*/
	require_once("Funcoes/validaSessao.php");

	include_once("Classes/Conexao.class.php");
	include_once("Classes/Funcionario.class.php");
	$Conexao = new Conexao();
	$Funcionario = new Funcionario($codigoFuncionario,$nomeFuncionario,$sobrenomeFuncionario,$loginFuncionario,$senhaFuncionario);
	
	if (isset($_GET['cp'])) {
		$cp = $_GET['cp'];
		$Funcionario->setCodigoFuncionario($cp);
	}
	
	if ($Funcionario->povoarCampos()) { //Chama o método que povoa os campos da classe de funcionarios
	
		$codigoFuncionario = $Funcionario->getCodigoFuncionario();
		$nomeFuncionario = $Funcionario->getNomeFuncionario();
		$sobrenomeFuncionario = $Funcionario->getSobrenomeFuncionario();
		$loginFuncionario = $Funcionario->getLoginFuncionario();
		$senhaFuncionario = $Funcionario->getSenhaFuncionario();
	
	}
?>
<!DOCKTPE html>
<html>
	<head>
		<title> Alteração de funcionários</title>
		<!-- Faz o envio do formulário com AJAX-->
		<script>
			$(document).ready(function(){
				//Validação com validate.js
				$("#formAlteracaoFuncionario").validate({
					
						rules:{					
													
							nomeFuncionario:{
								
								required: true
							},
							
							sobrenomeFuncionario:{
								required: true
							},
							
							loginFuncionario:{
								required: true
							},
							
							senhaFuncionario: {
								required: true
							}
						}, 
						messages: {
						
							nomeFuncionario:{
						
								required: "Preencha o nome do funcionário!"
							},
							
							sobrenomeFuncionario: {
								required: "Preencha o sobrenome do funcionário!"
							},
							
							loginFuncionario: {
								required: "Preencha o login do funcionário!"
							},
							
							senhaFuncionario: {
								required: "Preencha a senha do funcionário!"
							}
						},
						submitHandler: function( form ){ //Pega pelo id do Form, quando o botão submit for clicado
						
							//Função que verifica os dados vindos do submit e guarda na variavel DADOS
							var dados = $( form ).serialize();
							
							$.ajax({
								//Manda o método que é POST para a URL indicada
								type: "POST",
								url: "funcionarios-p.php?acao=3&cp=<?php echo $cp; ?>",
								data: dados,
								success: function() {
								
									//Cria a mensage de dados cadastrados com sucesso
									var mensagem = "<span class=\"dadosCorretos\">Dados alterados com sucesso!</span>";
									
									//Joga a mensagem na tela
									document.getElementById('mensagem').innerHTML = mensagem;
									//Apaga o texto inserido no campo
									document.getElementById('nomeFuncionario').value = "";
									document.getElementById('sobrenomeFuncionario').value = "";
									document.getElementById('loginFuncionario').value = "";
									document.getElementById('senhaFuncionario').value = "";
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
			<form action="" method="POST" id="formAlteracaoFuncionario">
				<span class="tituloFormulario">Alteração de funcionários</span>
				
				<table id="tabelaFormulario">

					<tbody>
						<tr>
							<td><label>Nome:</label></td>
							<td><input type="text" name="nomeFuncionario" value="<?php echo $nomeFuncionario; ?>" id="nomeFuncionario" title="Informe o nome do funcionário" placeholder="Informe o nome do funcionário"></td>
						</tr>
						
						<tr>
							<td><label>Sobrenome:</label></td>
							<td><input type="text" name="sobrenomeFuncionario" value="<?php echo $sobrenomeFuncionario; ?>" id="sobrenomeFuncionario" title="Informe o sobrenome do funcionário" placeholder="Informe o sobrenome do funcionário"></td>
						</tr>
						
						<tr>	
							<td><label>Login:</label></td>
							<td><input type="text" name="loginFuncionario" value="<?php echo $loginFuncionario; ?>" id="loginFuncionario" title="Informe um login" placeholder="Informe um login de acesso"></td>
						</tr>
						
						<tr>
							<td><label>Senha:</label></td>
							<td><input type="password" name="senhaFuncionario" id="senhaFuncionario" title="Informe uma senha de acesso"></td>
						</tr>
						
						<tr>
							<td><input type="submit" value="Alterar" id="submitFuncionarios" title="Alterar informações"></td>
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