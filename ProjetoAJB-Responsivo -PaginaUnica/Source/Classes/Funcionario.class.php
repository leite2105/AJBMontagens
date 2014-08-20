<?php
// ==========================================
// Autor: Nilton Cesar Do Amaral Junior
// Data: 11/08/2014
// Arquivo: Funcionarios.class.php
// Funcionalidade: Classe de funcionários
// =============================================

	class Funcionario {
	
		private $codigoFuncionario;
		private $codigoPermissao;
		private $nomeFuncionario;
		private $sobrenomeFuncionario;
		private $loginFuncionario;
		private $senhaFuncionario;
		
		public function __construct($codigoFuncionario,$codigoPermissao,$nomeFuncionario,$sobrenomeFuncionario,$loginFuncionario,$senhaFuncionario) {
		
			$this->setCodigoFuncionario($codigoFuncionario);
			$this->setCodigoPermissao($codigoPermissao);
			$this->setNomeFuncionario($nomeFuncionario);
			$this->setSobrenomeFuncionario($sobrenomeFuncionario);
			$this->setLoginFuncionario($loginFuncionario);
			$this->setSenhaFuncionario($senhaFuncionario);
		}
		
		public function setCodigoFuncionario($codigoFuncionario) {
			$this->codigoFuncionario = $codigoFuncionario;
		}
		
		public function setCodigoPermissao($codigoPermissao) {
			$this->codigoPermissao = $codigoPermissao;
		}
		
		public function setNomeFuncionario($nomeFuncionario) {
			$this->nomeFuncionario = $nomeFuncionario;
		}
		
		public function setSobrenomeFuncionario($sobrenomeFuncionario) {
			$this->sobrenomeFuncionario = $sobrenomeFuncionario;
		}
		
		public function setLoginFuncionario($loginFuncionario) {
			$this->loginFuncionario = $loginFuncionario;
		}
		
		public function setSenhaFuncionario($senhaFuncionario) {
			$this->senhaFuncionario = md5($senhaFuncionario);
		}
		
		public function getCodigoFuncionario () {
			return $this->codigoFuncionario;
		}
		
		public function getCodigoPermissao () {
			return $this->codigoPermissao;
		}
		
		public function getNomeFuncionario () {
			return $this->nomeFuncionario;
		}
		
		public function getSobrenomeFuncionario() {
			return $this->sobrenomeFuncionario;
		}
		
		public function getLoginFuncionario () {
			return $this->loginFuncionario;
		}
		
		public function getSenhaFuncionario () {
			return $this->senhaFuncionario;
		}
		
		public function incluirFuncionario () {
		
			$query = "INSERT INTO funcionarios (codigoFuncionario,codigoPermissao,nomeFuncionario,sobrenomeFuncionario,loginFuncionario,senhaFuncionario) VALUES ('".$this->getCodigoFuncionario()."','".$this->getCodigoPermissao()."','".$this->getNomeFuncionario()."','".$this->getSobrenomeFuncionario()."','".$this->getLoginFuncionario()."','".$this->getSenhaFuncionario()."');";
			
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
		}
		
		public function excluirFuncionario() {
		
			$query = "DELETE FROM funcionarios WHERE codigoFuncionario = '".$this->getCodigoFuncionario()."'";
			
			if (mysql_query($query)) {
				return true;
			} else {
				return false;
			}
		
		}
		
		public function alterarFuncionario() {
		
			$query = "UPDATE funcionarios SET codigoPermissao = '".$this->getCodigoPermissao()."'nomeFuncionario = '".$this->getNomeFuncionario()."', sobrenomeFuncionario = '".$this->getSobrenomeFuncionario()."', loginFuncionario = '".$this->getLoginFuncionario()."', senhaFuncionario = '".$this->getSenhaFuncionario()."' WHERE codigoFuncionario = '".$this->getCodigoFuncionario()."'";
			//echo $query;
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
		}
		
		public function consultarFuncionario () {
		
		
			$query = "SELECT codigoFuncionario,nomeFuncionario,sobrenomeFuncionario,loginFuncionario,senhaFuncionario FROM funcionarios";
			
			if ($dados = mysql_query($query)) {
			
				echo "<table id='tabelaConsulta'>";
				
				session_start();
						
				if ($_SESSION['codigo'] == 1) {
					// Caso a permissão seja 1, ou seja, administrador o usuário pode alterar e excluir
				
					echo "<tr id='cabecalhoTabelaConsulta'>
						<td><label>Código</label></td>
						<td><label>Nome</label></td>
						<td><label>Sobrenome</label></td>
						<td><label>Login</label></td>
						<td colspan='2'><label>Opções</label></td>
					</tr>";
					
					while ($array = mysql_fetch_array($dados)) {
							
							echo "<tr>";
								echo "<td>".$array['codigoFuncionario']."</td>";
								echo "<td>".$array['nomeFuncionario']."</td>";
								echo "<td>".$array['sobrenomeFuncionario']."</td>";
								echo "<td>".$array['loginFuncionario']."</td>";
								echo "<td><a id='botaoAlterar' title='Alterar informação' href='administracao.php?pag=funcionarios-p.php&acao=1&cp=".$array['codigoFuncionario']."'>Alterar</a></td>";
								echo "<td><a id='botaoExcluir' title ='Excluir informação' href='administracao.php?pag=funcionarios-p.php&acao=2&cp=".$array['codigoFuncionario']."'>Excluir</a></td>";
							echo "</tr>";
					
					}
				} else {
					// Caso a permissão seja 2, ou seja, OPERADOR o usuário pode apenas consultar
				
					echo "<tr id='cabecalhoTabelaConsulta'>
						<td><label>Código</label></td>
						<td><label>Nome</label></td>
						<td><label>Sobrenome</label></td>
						<td><label>Login</label></td>
					</tr>";
					
					while ($array = mysql_fetch_array($dados)) {
							
							echo "<tr>";
								echo "<td>".$array['codigoFuncionario']."</td>";
								echo "<td>".$array['nomeFuncionario']."</td>";
								echo "<td>".$array['sobrenomeFuncionario']."</td>";
								echo "<td>".$array['loginFuncionario']."</td>";
							echo "</tr>";
					
					}
				
					
				
				}
				echo "</table>";
			
			}

		}
		
		public function povoarCampos() { // Método usado para povoar os campos na alteração de funcionários

			$query = "SELECT codigoFuncionario,nomeFuncionario,sobrenomeFuncionario,loginFuncionario,senhaFuncionario FROM funcionarios WHERE codigoFuncionario = '".$this->getCodigoFuncionario()."'";
			
			if ($dados = mysql_query($query)) {

				$array = mysql_fetch_array($dados);
				
				$this->setCodigoFuncionario($array['codigoFuncionario']);
				$this->setNomeFuncionario($array['nomeFuncionario']);
				$this->setSobrenomeFuncionario($array['sobrenomeFuncionario']);
				$this->setLoginFuncionario($array['loginFuncionario']);
				$this->setSenhaFuncionario($array['senhaFuncionario']);
				
				return true;
			
			
			} else {
				return false;
			}
		
		}
	
	}


?>