<?php
// ============================================
// Autor: Nilton Cesar Do Amaral Junior
// Data: 12/08/2014
// Funcionalidade: Processar e enviar para a consulta desejada
// Arquivo: consultas-c.php
// ============================================

	require_once("Funcoes/validaSessao.php");

	$consultaEscolhida = $_POST['consultaEscolhida'];
	
	if (isset($_GET['ce'])) {
		$consultaEscolhida = $_GET['ce'];
	}
	
	include_once("Classes/Conexao.class.php");
	include_once("Classes/Funcionario.class.php");
	include_once("Classes/Midia.class.php");
	include_once("Classes/Produto.class.php");
	
	$Conexao = new Conexao();
	$Funcionario = new Funcionario($codigoFuncionario,$codigoPermissao,$nomeFuncionario,$sobrenomeFuncionario,$loginFuncionario,$senhaFuncionario);
	$Midia = new Midia ($codigoMidia,$descricaoMidia,$enderecoMidia,$nomeArquivo,$dataMidia);
	$Produto = new Produto ($codigoProduto,$descricaoProduto,$precoMEtroQuadradoProduto);
	
	switch ($consultaEscolhida) {
	
		case 'F':
			$Funcionario->consultarFuncionario();
			break;
		case 'M':
			$Midia->consultarMidia();
			break;
		case 'P':
			$Produto->consultarProduto();
			break;
	
	}







?>
