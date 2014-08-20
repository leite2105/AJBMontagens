<?php
// ==========================================
// Autor: Nilton Cesar Do Amaral Junior
// Data: 12/08/2014/08/2014
// Arquivo: Midia.class.php
// Funcionalidade: Classe de mídias
// =============================================

	class Midia {
	
		private $codigoMidia;
		private $descricaoMidia;
		private $enderecoMidia;
		private $dataMidia;
		private $nomeArquivo;
	
		
		public function __construct($codigoMidia,$descricaoMidia,$enderecoMidia,$nomeArquivo,$dataMidia) {
		
			$this->setCodigoMidia($codigoMidia);
			$this->setDescricaoMidia($descricaoMidia);
			$this->setEnderecoMidia($enderecoMidia);
			$this->setDataMidia($dataMidia);
			$this->setNomeArquivo($nomeArquivo);
		}
		
		public function setCodigoMidia($codigoMidia) {
			$this->codigoMidia = $codigoMidia;
		}
		public function setDescricaoMidia($descricaoMidia) {
			$this->descricaoMidia = $descricaoMidia;
		}
		
		public function setEnderecoMidia($enderecoMidia) {
			$this->enderecoMidia = $enderecoMidia;
		}
		
		public function setDataMidia($dataMidia) {
			
			$dataMidia = date('Y').'-'.date('m').'-'.date('d'); // Pega a data do sistema

			$this->dataMidia = $dataMidia;
		}
		
		public function setNomeArquivo($nomeArquivo) {
			
			$this->nomeArquivo = $nomeArquivo; 
			
		}
		
		public function getCodigoMidia () {
			return $this->codigoMidia;
		}
		
		public function getDescricaoMidia () {
			return $this->descricaoMidia;
		}
		
		public function getEnderecoMidia () {
			return $this->enderecoMidia;
		}
		
		public function getDataMidia() {
			return $this->dataMidia;
		}
		
		public function getNomeArquivo () {
			return $this->nomeArquivo;
		}
		
		public function validaTipoArquivo() {
			
			$tipo = array(png=>'png',jpg=>'jpg', jpeg=>'jpeg',avi=>'avi',mp4=>'mp4', JPG=>'JPG'); //Array com todos os tipos de Arquivos suportados
			$Arquivo = explode(".", $this->getNomeArquivo()); //Essa parte separa a STRINGs em Array, ou seja, isola a string
			
			//echo $Arquivo;
			$extensao = end($Arquivo); //Retorna o ultimo valor do array
			
			//echo "Extensao do arquivo".$extensao ."<br/>";
			
			
			if ($extensao == $tipo['png'] || $extensao == $tipo['jpg'] //Arquivo é o name do FILE
				|| $extensao == $tipo['jpeg'] || $extensao == $tipo['JPG']) {
				//Verifica se o tipo de Arquivo colocado é compativel com os suportados pelo sistema
				
				$nomeNovo = $this->getUltimoNomeMidiaProduto();
				
				
				$this->setNomeArquivo (md5($nomeNovo).'.'.$extensao);
				
				if ($this->validaTamanhoArquivo()) {
					//Chama o método de validação do tamanho do Arquivo
					
					
					
					
					if ($this->uploadArquivo()) {
						//Chama método de upload
						if ($this->incluirMidia()) {
						
							
							return true;
						
						} else {

							return false;
						
						}
						
					
					} else {
						return false;
					}
					
					
				}
				
			} else {
				//else do primeiro IF - caso o Arquivo não seja suportado
				

				echo "O tipo de Arquivo não é suportado suportado. Verifique!";
			}
		}
		
		public function validaTamanhoArquivo () {
		
			if ($_FILES['arquivo']['size'] > 20000) {
				
				return true;
			
			} else {
				
				return false;
			}
		}
		
		
		
		public function uploadArquivo () {
			//Método de upload de Arquivo
			
			$nomeArquivo = $this->getNomeArquivo();
			$destinoUpload = "Classes/Uploads/"; //Nome da pasta
			
			//echo "Nome temporario do arquivo:" . $_FILES['Arquivo']['tmp_name'];
			//echo "<br/>Nome da pasta de destino::" . $destinoUpload . "/" . $nomeArquivo;
		
			if (move_uploaded_file( $_FILES['arquivo']['tmp_name'], $destinoUpload.$nomeArquivo)) {
				return true;
			} else {
				
				return false;
			}
			
		}
		
		public function incluirMidia() {
			
			
			
			$nomeFinal = "Classes/Uploads/" . $this->getNomeArquivo();
			
			
			$query = "INSERT INTO midias (codigoMidia,descricaoMidia,enderecoMidia,dataMidia) VALUES ('".$this->getCodigoMidia()."','".$this->getDescricaoMidia()."','".$nomeFinal."','".$this->getDataMidia()."');";
		
			//echo $query;
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
		}
		
		public function getUltimoNomeMidiaProduto () {
			
			$query = "SELECT codigoMidia FROM midias ORDER BY codigoMidia DESC LIMIT 1";
			
			$dados = mysql_query($query) or die (mysql_error());
			
			$linha = mysql_fetch_row ($dados);
			
			return (String) $linha[0] + 1;
			
			
		
		}
		
		public function excluirMidia () {
		
			$query = "DELETE FROM midias WHERE codigoMidia = '".$this->getCodigoMidia()."'";
			
			//echo $query;
			
			if (mysql_query($query) or die (mysql_error())) {
				return true;
			} else {
				return false;
			}
		}
		
		public function excluirUpload () {
		
			 $nomeArquivo = $this->getNomeArquivo();
			// echo "Arquivo" . $nomeArquivo;
			//echo "AQUI";
			
		    //$destinoUpload = "Classes/Imgs/"; //Nome da pasta
			
			//$Arquivo = explode(".", $_FILES['Arquivo']['name']); //Essa parte separa o STRINGs em STRINGS, ou seja, isola a string
			
			//$extensao = end($Arquivo); //Retorna o ultimo valor do array
			
			
			if ($this->excluirMidia()) {
				if (unlink($nomeArquivo)) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
				
					
				
			
		
		}
		
		
		public function consultarMidia() {
		
			$query = "SELECT codigoMidia,descricaoMidia,enderecoMidia,date_format(dataMidia, '%d/%m/%Y') as dataNovaMidia FROM midias";
			
			if ($dados = mysql_query($query)) {
			
				echo "<table id='tabelaConsulta'>";
				
				session_start();
				
				if ($_SESSION['codigo'] == 1) {
					// Caso seja ADMINISTRADRO pode alterar e excluir
					echo "<tr id='cabecalhoTabelaConsulta'>
							<td>Código</td>
							<td>Descrição</td>
							<td>Mídia</td>
							<td>Opção</td>
						  </tr>";
						  
					while ($array = mysql_fetch_array($dados)) {
					
					
						echo "<tr>";
							echo "<td>".$array['codigoMidia']."</td>";
							echo "<td>".$array['descricaoMidia']."</td>";
							echo "<td><img width='100px' height='50px' title='".$array['dataNovaMidia']."' src='".$array['enderecoMidia']."'></td>";
							echo "<td><a id='botaoExcluir' title ='Excluir informação' href='administracao.php?pag=midias-p.php&acao=1&en=".$array['enderecoMidia']."&cp=".$array['codigoMidia']."'>Excluir</a></td>";
						echo "</tr>";
					
					
					}
				} else {
				
					// Caso seja OPERADOR apenas consultar
					echo "<tr id='cabecalhoTabelaConsulta'>
							<td>Código</td>
							<td>Descrição</td>
							<td>Mídia</td>
						  </tr>";
						  
					while ($array = mysql_fetch_array($dados)) {
					
					
						echo "<tr>";
							echo "<td>".$array['codigoMidia']."</td>";
							echo "<td>".$array['descricaoMidia']."</td>";
							echo "<td><img width='100px' height='50px' title='".$array['dataNovaMidia']."' src='".$array['enderecoMidia']."'></td>";
						echo "</tr>";
					
					
					}
				
				
				
				}
				echo "</table>";
			
			}

		}
		
		
		public function imagensBanner() {
		
			$query = "SELECT codigoMidia,descricaoMidia,enderecoMidia,dataMidia FROM midias ORDER BY codigoMidia DESC LIMIT 4";
			
			if ($dados = mysql_query($query)) {
			
				while($array = mysql_fetch_array($dados)) {
					echo "<div class='item'>";
						echo "<img src=".$array['enderecoMidia']." title=".$array['descricaoMidia']." />";
					echo "</div>";
						
				}
			}

		}
		
		public function mostrarGaleria() {
		
			$query = "SELECT codigoMidia, descricaoMidia, enderecoMidia, dataMidia FROM midias ORDER BY codigoMidia";
			
			if ($dados = mysql_query($query)) {
			
				while ($array = mysql_fetch_array($dados)) {
				
					echo "<div class='col-lg-4'>";
						echo "<a class='html5lightbox' data-group=\"galeria\"  href=".$array['enderecoMidia']."><img class='imagem' src=".$array['enderecoMidia']." title=".$dataMidia['dataMidia']." ></a>";
						echo "<p class='descricaoImagem'>".$array['descricaoMidia']."</p>";
					echo "</div>";
				
				}
			
			
			}
		
		
		}
			
	}


?>