<?php
//===========================================
//Autor: Nilton Cesar Do Amaral Junior
// Data: 16/08/2014
// Funcionalidade: Enviar Emails de Contato
// Arquivo: contato.php
//============================================

	$nomeCliente = $_POST['nomeCliente'];
	$sobrenomeCliente = $_POST['sobrenomeCliente'];
	$emailCliente = $_POST['emailDescricao'];
	$descricaoCliente = $_POST['descricaoCliente'];
	
	// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
	// O return-path deve ser ser o mesmo e-mail do remetente.
	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
	$headers .= "From: nilton_junior_leite@hotmail.com\r\n"; // remetente
	$headers .= "Return-Path: nilton_junior_leite@hotmail.com\r\n"; // return-path
	$headers .= "Reply-To: $emailCliente\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
	$envio = mail("nilton_junior_leite@hotmail.com", "Assunto", "Texto", $headers,"-fnilton_junior_leite@hotmail.com");
	 
	if($envio) {
	 echo "Mensagem enviada com sucesso";
	} else {
	 echo "A mensagem não pode ser enviada";
	}
	
	/*
	// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
	require("PHPMailer-master/class.phpmailer.php");

	// Inicia a classe PHPMailer
	$mail = new PHPMailer();

	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "smtp.live.com"; // Endereço do servidor SMTP
	$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->Username = 'nilton_junior_leite@hotmail.com'; // Usuário do servidor SMTP
	$mail->Password = 'Leite0511'; // Senha do servidor SMTP

	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = $emailCliente; // Seu e-mail
	$mail->FromName = $nomeCliente; // Seu nome

	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress('nilton_junior_leite@hotmail.com', 'Nilton Junior');
	$mail->AddAddress('nilton_junior_leite@hotmail.com');
	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
	//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Mensagem Teste"; // Assunto da mensagem
	$mail->Body = $descricaoCliente;
	$mail->AltBody = $descricaoCliente;

	// Define os anexos (opcional)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

	// Envia o e-mail
	$enviado = $mail->Send();

	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();

	// Exibe uma mensagem de resultado
	if ($enviado) {
		echo "E-mail enviado com sucesso!";
	} else {
		echo "Não foi possível enviar o e-mail.<br /><br />";
		echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
	}
*/

?>