<?php ob_start();
// ================================================
// Autor: Nilton Cesar Do Amaral Junior
// Data: 14/08/2014	
// Funcionalidade: Verificar Login
// Arquivo: validaLogin.php
// ================================================

	$loginFuncionario = $_POST['loginFuncionario'];
	$senhaFuncionario = $_POST['senhaFuncionario'];
	
	include_once("../Classes/Conexao.class.php");
	include_once("../Classes/Login.class.php");
	
	$Conexao = new Conexao();
	$Login = new Login($loginFuncionario,$senhaFuncionario);
	
	if ($Login->validaLogin()) {
		header("Location: ../administracao.php");
	} else {
		header("Location: erroLogin.php");
	}


?>