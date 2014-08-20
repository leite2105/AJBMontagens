<?php
// =====================================
// Autor: NIlton Cesar Do Amaral Junior
// Data: 11/08/2014
// Funcionalidade: Classe de conexão com o banco de dados
// Arquivo: Conexao.class.php
//======================================

	class Conexao {
		
		public function __construct () {
		
			$local = "localhost";
			$DBname = "AJB";
			$usuario = "root";
			$senha = "";
			
			if (!($this->codigo = mysql_connect($local,$usuario,$senha))) {
				echo "Não foi possível fazer uma conexão com o banco de dados Mysql. Favor consultar o administrador!";
				exit;
			}	
		
			if (!($this->conexao = mysql_select_db($DBname,$this->codigo))) {
				echo "Não foi possível fazer uma conexão com o banco de dados. Favor contatar o administrador!";
				exit;
			}
		
		}
		
		
		
	
	}


?>