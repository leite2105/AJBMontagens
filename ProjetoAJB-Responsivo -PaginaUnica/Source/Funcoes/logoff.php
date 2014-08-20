<?php ob_start(); session_start();
// ==============================================
// Autor: Nilton Cesar DO Amaral Junior
// Data: 14/08/2014	
// Funcionalidade: Sair da área administratica, fazer Logoff
// Arquivo: logoff.php
// ======================================================

	
	unset($_SESSION['login']);	// elimina a sessão			
	unset($_SESSION['senha']);
	unset($_SESSION['codigo']);
	header("Location: Funcoes/login.php");
?>