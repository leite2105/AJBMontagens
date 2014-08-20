<?php
// =======================================
// Autor: Bootstrap com alterações por Nilton Cesar Do Amaral Junior
// Data: 14/08/2014
// Funcionalidade: Tela de login
// Arquivo: login.php
// ============================================

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../Css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Css/style.css" rel="stylesheet">

    
  </head>

  <body id="bodyLogin">

    <div class="container">

      <form action="validaLogin.php" method="POST" class="form-signin" role="form">
        <h2 class="form-signin-heading">Faça seu login</h2>
        <input type="text" id="botaoLogin" name="loginFuncionario" class="form-control" placeholder="Login" required autofocus>
        <input type="password" id="botaoSenha" name="senhaFuncionario" class="form-control" placeholder="Senha" required>
        <label class="checkbox">
			<input type="checkbox" value="remember-me"> Lembre-me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
