<?php
/* ====================================
Autor: Nilton Cesar Do Amaral Junior
Data: 11/08/2014
Arquivo: funcionarios-f.php
===================================*/
	require_once("Funcoes/validaSessao.php");
?>
<!DOCKTPE html>
<html>
	<head>
		<title> Cadastro de funcionários</title>
	</head>
	
	<body>
		<div id="formularios">
			<form action="" method="POST" id="formFuncionario">
				<span class="tituloFormulario">Cadastro de funcionários</span>
				<table id="tabelaFormulario">
							
					<tbody>
						<tr>
							<td><label>Permissão:</label></td>
							<td><select id="permissao" name="codigoPermissao">
									<option value="">Selecione</option>
									<option value="1">Administrador</option>
									<option value="2">Operador</option>
									<select></td>
						</tr>
						<tr>
							<td><label>Nome:</label></td>
							<td><input type="text" name="nomeFuncionario" id="nomeFuncionario" title="Informe o nome do funcionário" placeholder="Informe o nome do funcionário"></td>
						</tr>
						
						<tr>
							<td><label>Sobrenome:</label></td>
							<td><input type="text" name="sobrenomeFuncionario" id="sobrenomeFuncionario" title="Informe o sobrenome do funcionário" placeholder="Informe o sobrenome do funcionário"></td>
						</tr>
						
						<tr>	
							<td><label>Login:</label></td>
							<td><input type="text" name="loginFuncionario" id="loginFuncionario" title="Informe um login" placeholder="Informe um login de acesso"></td>
						</tr>
						
						<tr>
							<td><label>Senha:</label></td>
							<td><input type="password" name="senhaFuncionario" id="senhaFuncionario" title="Informe uma senha de acesso"></td>
						</tr>
						
						<tr>
							<td><input type="submit" value="Cadastrar" id="submitFuncionarios" title="Cadastrar informações"></td>
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