<?php ob_start(); session_start(); 
	require_once("Funcoes/validaSessao.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página administrativa">
    <meta name="author" content="Nilton Cesar Do Amaral Junior">
   <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>AJB montagens - Administração</title>

    <!-- Bootstrap core CSS -->
    <link href="Css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Css/style.css" rel="stylesheet">

  </head>
  
	<?php 
	
		if ($_SESSION['codigo'] == 1) {
			// Caso a permissão seja 1, ou seja, é o ADMINISTRADOR
			
	?>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="administracao.php">AJB montagens industrial</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="administracao.php">Home</a></li>
            <li><a href="?pag=funcionarios-f.php">Funcionários</a></li>
            <li><a href="?pag=midias-f.php">Mídias</a></li>
            <li><a href="?pag=produtos-f.php">Produtos</a></li>
            <li><a href="?pag=consultas-f.php">Consultas</a></li>
            <li><a href="?pag=Funcoes/logoff.php">Logoff</a></li>
          </ul>
          
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="administracao.php">Home</a></li>
					<li><a href="?pag=funcionarios-f.php">Funcionários</a></li>
					<li><a href="?pag=midias-f.php">Mídias</a></li>
					<li><a href="?pag=produtos-f.php">Produtos</a></li>
					<li><a href="?pag=consultas-f.php">Consultas</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Usuário logado: <?php echo $_SESSION['login'];?></h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                <?php
				
					if (isset($_GET['pag'])) {
						include_once($_GET['pag']);
					} else {
						//echo "Seja bem vindo a área administrativa";
						echo "<img id='imagemLogo' src='Imagens/logo.jpg'>";
					}
				
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <script src="Scripts/geral.js"></script>
    <script src="Scripts/jquery.validate.js"></script>
  </body>
  
  <?php
		} else { ?>
			<!-- Caso a permissão seja 2, ou seja, é um OPERADOR-->
			<body>

				<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="administracao.php">AJB montagens industrial</a>
					</div>
					<div class="navbar-collapse collapse">
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="administracao.php">Home</a></li>
						<li><a href="?pag=consultas-f.php">Consultas</a></li>
						<li><a href="?pag=Funcoes/logoff.php">Logoff</a></li>
					  </ul>
					  
					</div>
				  </div>
				</div>

				<div class="container-fluid">
				  <div class="row">
					<div class="col-sm-3 col-md-2 sidebar">
					  <ul class="nav nav-sidebar">
						<li><a href="administracao.php">Home</a></li>
							<li><a href="#">Orçamento</a></li>
							<li><a href="?pag=consultas-f.php">Consultas</a></li>
					  </ul>
					 
					</div>
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					  <h1 class="page-header">Usuário logado: <?php echo $_SESSION['login'];?></h1>

					  <div class="table-responsive">
						<table class="table table-striped">
						  <tbody>
							<?php
							
								if (isset($_GET['pag'])) {
									include_once($_GET['pag']);
								} else {
									//echo "Seja bem vindo a área administrativa";
									echo "<img id='imagemLogo' src='Imagens/logo.jpg'>";
								}
							
							?>
						  </tbody>
						</table>
					  </div>
					</div>
				  </div>
				</div>

				<!-- Bootstrap core JavaScript
				================================================== -->
				<!-- Placed at the end of the document so the pages load faster -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
				<script src="Scripts/bootstrap.min.js"></script>
				<script src="Scripts/geral.js"></script>
				<script src="Scripts/jquery.validate.js"></script>
			 </body>
		
		<?php } ?>
</html>
