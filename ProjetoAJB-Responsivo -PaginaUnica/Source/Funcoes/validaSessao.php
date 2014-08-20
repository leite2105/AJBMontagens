<?php ob_start();
/*
================================================================
Autor: Nilton Cesar Do Amaral Junior
Data: 14/08/2014
Funcionalidade: Verificar se existe tentativa de acesso indevido
Arquivo:validaSessao.php
================================================================
*/
	session_start();
	
	if (!isset($_SESSION['login']) and (!isset($_SESSION['senha'])) and (!isset($_SESSION['codigo']))) {
	
		echo "<script>";
			echo "alert(\"Tentativa de acesso indevido!\");";
			echo "location.href='Funcoes/login.php'";
		echo "</script>";
	
	}
?>


