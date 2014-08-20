<?php 
/* ====================================
Autor: Nilton Cesar Do Amaral Junior
Data: 12/08/2014
Arquivo: midias-p.php
Funcionalidade: Processamento de midias
===================================*/

	//require_once("Funcoes/validaSessao.php");
	
	$codigoMidia    = $_POST['codigoMidia'];
	$descricaoMidia = $_POST['descricaoMidia'];
	
	if (isset($_FILES['arquivo'])) {
		
		$nomeArquivo =  $_FILES['arquivo']['name'];
		//print_r($Arquivo);
		$enderecoMidia  = "Classes/Uploads/" .$nomeArquivo;
	
	} else {
	
		echo "Tem nada";
	}
	
	include("Classes/Conexao.class.php");
	include("Classes/Midia.class.php");
	
	
	$Conexao = new Conexao();
	$Upload = new Midia($codigoMidia,$descricaoMidia,$enderecoMidia,$nomeArquivo,$dataMidia);
	
	if (isset($_GET['acao'])) {
		
		$acao = $_GET['acao'];
		$cp = $_GET['cp'];
		$endereco = $_GET['en'];
		$Upload->setCodigoMidia($cp);
		$Upload->setNomeArquivo($endereco);
	}
		
	switch ($acao) {
		
		case 0 :
			if ($Upload->validaTipoArquivo()) {
				echo "<script>";
				echo "alert(\"Upload e o cadastro foram feitas com sucesso!\");";
				echo "location.href='administracao.php?pag=midias-f.php'";
				echo "</script>";
			
			} else {
				echo "<script>";
				echo "alert(\"Ocorreu um erro. Verifique!\");";
				echo "location.href='administracao.php?p=midiasProdutos-f.php'";
				echo "</script>";
			}
			
			break;
			
		case 1:
			
			if ($Upload->excluirUpload()) {

				echo "<script>";
				echo "alert(\"As exclusoes foram feitas com sucesso!\");";
				echo "location.href='administracao.php?pag=consultas-c.php&ce=M'";
				echo "</script>";
			
			} else {
				
				echo "<script>";
				echo "alert(\"Ocorreu um erro. Verifique!\");";
				echo "location.href='administracao.php?p=midiasProdutos-c.php'";
				echo "</script>";
			
			
			}
			
			break;
	
	
	}
	
	
	//$Upload->validaTipoArquivo();


?>