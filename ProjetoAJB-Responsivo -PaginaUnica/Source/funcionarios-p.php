<?php ob_start();
/* ==============================================
Autor: Nilton Cesar do Amaral Junior
Data: 11/08/2014
Funcionalidade: Processamento de funcionarios
Arquivo: funcionarios-p.php
==================================================
*/
	require_once("Funcoes/validaSessao.php");
	

	 $codigoFuncionario = $_POST['codigoFuncionario'];
	 $codigoPermissao = $_POST['codigoPermissao'];
	 $nomeFuncionario   = $_POST['nomeFuncionario'];
	 $sobrenomeFuncionario = $_POST['sobrenomeFuncionario'];
	 $loginFuncionario = $_POST['loginFuncionario'];
	 $senhaFuncionario = $_POST['senhaFuncionario'];
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/Funcionario.class.php");
	$Conexao = new Conexao();
	$Funcionario = new Funcionario($codigoFuncionario,$codigoPermissao,$nomeFuncionario,$sobrenomeFuncionario,$loginFuncionario,$senhaFuncionario);
	
	if (isset($_GET['acao'])) {
		$acao = $_GET['acao'];
		
	}
	
	if (isset($_GET['cp'])) {
		$cp = $_GET['cp'];
		$Funcionario->setCodigoFuncionario($cp);
	}
	
	
	switch ($acao) {
	
		case 0:
			if ($Funcionario->incluirFuncionario()) {
				echo "<script>
						alert(\"Ocorreu um erro ao excluir. Verifique!\");
						location.href='administracao.php?pag=funcionarios-f.php&ce=F';
					  </script>";
			} else {
				echo "<label>Ocorreu um erro ao cadastrar. Verifique!</label>";
			}
			break;
		case 1:
			echo "<script>
					location.href='administracao.php?pag=funcionarios-a.php&cp=$cp';
				  </script>";
			break;
		case 2:
			if ($Funcionario->excluirFuncionario()) {
				echo "<script>
						alert(\"Dados excluídos com sucesso!\");
						location.href='administracao.php?pag=consultas-c.php&ce=F';
					  </script>";
				
			} else {
				echo "<script>
						alert(\"Ocorreu um erro ao excluir. Verifique!\");
						location.href='administracao.php?pag=consultas-c.php&ce=F';
					  </script>";
			}
			break;
		case 3:
			if ($Funcionario->alterarFuncionario()) {
				echo "<script>
						location.href='administracao.php?pag=consultas-c.php&ce=F';
					  </script>";
			} else {
				echo "Ocorreu um erro ao alterar.Verifique!";
			}
			break;
	}
	


?>