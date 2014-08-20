<?php
// =================================================
// Autor: Nilton Cesar Do Amaral Junior
// Data: 14/08/2014	
// Funcionalidade: Organizar e verificar login
// Arquivo: Login.class.php
// =================================================

	class Login {
	
		private $loginFuncionario;
		private $senhaFuncionario;
	
		public function __construct($loginFuncionario, $senhaFuncionario) {
		
			$this->setLoginFuncionario($loginFuncionario);
			$this->setSenhaFuncionario($senhaFuncionario);
		}
		
		public function setLoginFuncionario($loginFuncionario) {
			$this->loginFuncionario = $loginFuncionario;
		}
		
		public function setSenhaFuncionario($senhaFuncionario) {
			$this->senhaFuncionario = md5($senhaFuncionario);
		}
		
		public function getLoginFuncionario() {
			return $this->loginFuncionario;
		}
		
		public function getSenhaFuncionario() {
			return $this->senhaFuncionario;
		}
		
		public function validaLogin() {
		
			$query = "SELECT codigoFuncionario, loginFuncionario, senhaFuncionario, codigoPermissao FROM funcionarios WHERE loginFuncionario = '".$this->getLoginFuncionario()."' AND senhaFuncionario = '".$this->getSenhaFuncionario()."'";
			echo $query;
			if ($dados = mysql_query($query)) {
				
				$rows = mysql_num_rows($dados);
				if ($rows === 1) {
					
					$array = mysql_fetch_array($dados);
					
					if ($this->sessionLogin($array['loginFuncionario'],$array['senhaFuncionario'],$array['codigoPermissao'])) {
					
						return true;
					}
				} else {
					return false;
				}
			
			} else {
				return false;
			}
		
		}
		
		public function sessionLogin($loginFuncionario,$senhaFuncionario,$codigoPermissao) {
		
			session_start();
			
			$_SESSION['login'] = $loginFuncionario;
			$_SESSION['senha'] = $senhaFuncionario;
			$_SESSION['codigo'] = $codigoPermissao;
			
			return true;
		
		}
	
	
	
	}

?>