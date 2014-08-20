/* ========================================== Envio de submit com AJAX em FUNCIONARIOS-F =============================================*/	
		$(document).ready(function(){
			//Validação com validate.js
			$("#formFuncionario").validate({
				
					rules:{					
												
						nomeFuncionario:{
							
							required: true
						},
						
						sobrenomeFuncionario:{
							required: true
						},
						
						loginFuncionario:{
							required: true
						},
						
						senhaFuncionario: {
							required: true
						}
					}, 
					messages: {
					
						nomeFuncionario:{
					
							required: "Preencha o nome do funcionário!"
						},
						
						sobrenomeFuncionario: {
							required: "Preencha o sobrenome do funcionário!"
						},
						
						loginFuncionario: {
							required: "Preencha o login do funcionário!"
						},
						
						senhaFuncionario: {
							required: "Preencha a senha do funcionário!"
						}
					},
					submitHandler: function( form ){ //Pega pelo id do Form, quando o botão submit for clicado
					
						//Função que verifica os dados vindos do submit e guarda na variavel DADOS
						var dados = $( form ).serialize();
						
						$.ajax({
							//Manda o método que é POST para a URL indicada
							type: "POST",
							url: "funcionarios-p.php",
							data: dados,
							success: function() {
							
								//Cria a mensage de dados cadastrados com sucesso
								var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
								
								//Joga a mensagem na tela
								document.getElementById('mensagem').innerHTML = mensagem;
								//Apaga o texto inserido no campo
								document.getElementById('nomeFuncionario').value = "";
								document.getElementById('sobrenomeFuncionario').value = "";
								document.getElementById('loginFuncionario').value = "";
								document.getElementById('senhaFuncionario').value = "";
								$("#mensagem").show();
								
								
								setTimeout(function() {
									$('#mensagem').hide();
									}, 
								2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
							}
							
						});
						
						return false;
					}
			});	
		});
		
/* ========================================== Envio de submit com AJAX em PRODUTOS-F =============================================*/	
		$(document).ready(function(){
			//Validação com validate.js
			$("#formProduto").validate({
				
					rules:{					
												
						descricaoProduto:{
							
							required: true
						},
						
						precoMetroQuadradoProduto:{
							required: true
						}
						
					}, 
					messages: {
					
						descricaoProduto:{
					
							required: "Preencha a descrição do produto!"
						},
						
						precoMetroQuadradoProduto: {
							required: "Preencha o preço do produto!"
						}
					},
					submitHandler: function( form ){ //Pega pelo id do Form, quando o botão submit for clicado
					
						//Função que verifica os dados vindos do submit e guarda na variavel DADOS
						var dados = $( form ).serialize();
						
						$.ajax({
							//Manda o método que é POST para a URL indicada
							type: "POST",
							url: "produtos-p.php",
							data: dados,
							success: function() {
							
								//Cria a mensage de dados cadastrados com sucesso
								var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
								
								//Joga a mensagem na tela
								document.getElementById('mensagem').innerHTML = mensagem;
								//Apaga o texto inserido no campo
								document.getElementById('descricaoProduto').value = "";
								document.getElementById('precoMetroQuadradoProduto').value = "";
								
								$("#mensagem").show();
								
								
								setTimeout(function() {
									$('#mensagem').hide();
									}, 
								2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
							}
							
						});
						
						return false;
					}
			});	
		});