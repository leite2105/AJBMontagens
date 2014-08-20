<?php ob_start();
/* ==============================================
Autor: Nilton Cesar do Amaral Junior
Data: 12/08/2014
Funcionalidade: Processamento de produtos
Arquivo: produtos-p.php
==================================================
*/
	require_once("Funcoes/validaSessao.php");

	$codigoProduto = $_POST['codigoProduto'];
	$descricaoProduto   = $_POST['descricaoProduto'];
	$precoMetroQuadradoProduto = $_POST['precoMetroQuadradoProduto'];
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/Produto.class.php");
	$Conexao = new Conexao();
	$Produto = new Produto($codigoProduto,$descricaoProduto,$precoMetroQuadradoProduto);
	
	
	if (isset($_GET['acao'])) {
		$acao = $_GET['acao'];
	}
	
	if (isset($_GET['cp'])) {
		$cp = $_GET['cp'];
		$Produto->setCodigoProduto($cp);
	}
	
	switch ($acao) {
	
		case 0:
			if ($Produto->incluirProduto()) {
				echo "<script>
						location.href='administracao.php?pag=produtos-f.php&ce=P';
					  </script>";
			} else {
				echo "<label>Ocorreu um erro ao cadastrar. Verifique!</label>";
			}
			break;
		case 1:
			echo "<script>
					location.href='administracao.php?pag=produtos-a.php&cp=$cp';
				  </script>";
			break;
		case 2:
			if ($Produto->excluirProduto()) {
				echo "<script>
						alert(\"Dados excluídos com sucesso!\");
						location.href='administracao.php?pag=consultas-c.php&ce=P';
					  </script>";
			} else {
			
			echo "<script>
						alert(\"Ocorreu um erro ao excluir. Verifique!\");
						location.href='administracao.php?pag=consultas-c.php&ce=P';
					  </script>";
			}
			break;
		case 3:
			if ($Produto->alterarProduto()) {
				echo "<script>
						location.href='administracao.php?pag=produtos-c.php&ce=P';
					  </script>";
			} else {
				echo "Dados alterados com sucesso!";
			}
	}
	


?>