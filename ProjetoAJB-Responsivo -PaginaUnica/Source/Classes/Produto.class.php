<?php
// ==========================================
// Autor: Nilton Cesar Do Amaral Junior
// Data: 12/08/2014/08/2014
// Arquivo: Produto.class.php
// Funcionalidade: Classe de produtos
// =============================================

	class Produto {
	
		private $codigoProduto;
		private $descricaoProduto;
		private $precoMetroQuadradoProduto;
	
		
		public function __construct($codigoProduto,$descricaoProduto,$precoMetroQuadradoProduto) {
		
			$this->setCodigoProduto($codigoProduto);
			$this->setDescricaoProduto($descricaoProduto);
			$this->setPrecoMetroQuadradoProduto($precoMetroQuadradoProduto);
		}
		
		public function setCodigoProduto($codigoProduto) {
			$this->codigoProduto = $codigoProduto;
		}
		
		public function setDescricaoProduto($descricaoProduto) {
			$this->descricaoProduto = $descricaoProduto;
		}
		
		public function setPrecoMetroQuadradoProduto($precoMetroQuadradoProduto) {
			$this->precoMetroQuadradoProduto = $precoMetroQuadradoProduto;
		}
		
		public function getCodigoProduto () {
			return $this->codigoProduto;
		}
		
		public function getDescricaoProduto () {
			return $this->descricaoProduto;
		}
		
		public function getPrecoMetroQuadradoProduto() {
			return $this->precoMetroQuadradoProduto;
		}
		
		public function incluirProduto () {
		
			$query = "INSERT INTO produtos (codigoProduto,descricaoProduto,precoMetroQuadradoProduto) VALUES ('".$this->getCodigoProduto()."','".$this->getDescricaoProduto()."','".$this->getPrecoMetroQuadradoProduto()."');";
			
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
		}
		
		public function excluirProduto() {
		
			$query = "DELETE FROM produtos WHERE codigoProduto = '".$this->getCodigoProduto()."'";
			
			if (mysql_query($query)) {
				return true;
			} else {
				return false;
			}
		
		}
		
		public function alterarProduto() {
		
			$query = "UPDATE produtos SET descricaoProduto = '".$this->getDescricaoProduto()."', precoMetroQuadradoProduto = '".$this->getPrecoMetroQuadradoProduto()."' WHERE codigoProduto = '".$this->getCodigoProduto()."';";
			
			if (mysql_query($query)) {
				return true;
			} else {
				return false;
			}
		}
		
		public function consultarProduto() {
		
		
			$query = "SELECT codigoProduto,descricaoProduto,precoMetroQuadradoProduto FROM produtos";
			
			if ($dados = mysql_query($query)) {
			
				echo "<table id='tabelaConsulta'>";
				
				session_start();
				
				if ($_SESSION['codigo'] == 1) {
					//Caso seja ADMINISTRADOR altera e exclui
					echo "<tr id='cabecalhoTabelaConsulta'>
						<td><label>Código</label></td>
						<td><label>Descrição</label></td>
						<td><label>Preço</label></td>
						<td colspan='2'><label>Opções</label></td>
					</tr>";
					
					while ($array = mysql_fetch_array($dados)) {
					
					
						echo "<tr>";
							echo "<td>".$array['codigoProduto']."</td>";
							echo "<td>".$array['descricaoProduto']."</td>";
							echo "<td>".$array['precoMetroQuadradoProduto']."</td>";
							echo "<td><a id='botaoAlterar' title='Alterar informação' href='administracao.php?pag=produtos-p.php&acao=1&cp=".$array['codigoProduto']."'>Alterar</a></td>";
							echo "<td><a id='botaoExcluir' title ='Excluir informação' href='administracao.php?pag=produtos-p.php&acao=2&cp=".$array['codigoProduto']."'>Excluir</a></td>";
						echo "</tr>";
					}
				} else {
					// Caso seja OPERADOR apenas consulta
						echo "<tr id='cabecalhoTabelaConsulta'>
						<td><label>Código</label></td>
						<td><label>Descrição</label></td>
						<td><label>Preço</label></td>
					</tr>";
					
					while ($array = mysql_fetch_array($dados)) {
					
					
						echo "<tr>";
							echo "<td>".$array['codigoProduto']."</td>";
							echo "<td>".$array['descricaoProduto']."</td>";
							echo "<td>".$array['precoMetroQuadradoProduto']."</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
			
			}
		}
		
		public function povoarCampos() { // Método usado para povoar os campos na alteração de funcionários

			$query = "SELECT codigoProduto,descricaoProduto,precoMetroQuadradoProduto FROM produtos WHERE codigoProduto = '".$this->getCodigoProduto()."'";
			
			if ($dados = mysql_query($query)) {

				$array = mysql_fetch_array($dados);
				
				$this->setCodigoProduto($array['codigoProduto']);
				$this->setDescricaoProduto($array['descricaoProduto']);
				$this->setPrecoMetroQuadradoProduto($array['precoMetroQuadradoProduto']);
								
				return true;
			
			
			} else {
				return false;
			}
		
		}
	
	}


?>