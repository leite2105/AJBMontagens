<?php
// ========================================================
// Autor: Nilton Cesaro Do Amaral Junior
// Data: 15/08/2014
// FUncionalidade: index, página para o cliente
// Arquivo: index.php
// =========================================================

	include_once("Classes/Conexao.class.php");
	include_once("Classes/Midia.class.php");
	
	$Conexao = new Conexao();
	$Midia = new Midia($codigoMidia,$descricaoMidia,$nomeArquivo,$enderecoMidia,$dataMidia);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina do cliente">
    <meta name="author" content="Nilton Cesar Do Amaral Junior">
    <link rel="icon" href="../../favicon.ico">

    <title>AJB montagens</title>

    <!-- Bootstrap core CSS -->
    <link href="Css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Css/index.css" rel="stylesheet">
    <link href="Css/lightbox.css" rel="stylesheet">
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <script src="Scripts/html5lightbox.js"></script>
    <script src="Scripts/lightbox.js"></script>
		
  </head>
<!-- NAVBAR = Menu
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">AJB MONTAGENS</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#historia">História</a></li>
                <li><a href="#servicos">Serviços</a></li>
                <li><a href="#obras">Obras</a></li>
                <li><a href="#contato">Contato</a></li>
				<!-- Menu dropdonw 
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Outros <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#galeria">Galeria</a></li>
                    <li><a href="#orcamento">Orçamento</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
				-->
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Carousel= Banner
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicadores = Bolinhas que ficam indicando qual slide está -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
			<img src="Imagens/novoLogo.jpg">
        </div>
		<?php
			$Midia->imagensBanner();	
		?>
		
		<!--
		<div class="container">
			<div class="carousel-caption">
				<p><a class="btn btn-lg btn-primary" href="#galeria" role="button">Galeria</a></p>
			</div>
		</div> -->
      </div> 
	  
	  <!-- Setas que ficam ao lado do banner -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



	<!-- INICIO DA HISTORIA DA EMPRESA -  Algumas classes são do bootstrap-->

    <div class="container marketing">
		<a name="historia"></a> <!-- Link usado para fazer a ancora do menu-->
		<div class="row featurette">
			<h2>HISTÓRIA</h2>
					
			<div class="col-lg-4">
			  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			  <h2>Heading</h2>
			  <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
			  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			  <h2>Heading</h2>
			  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			  <h2>Heading</h2>
			  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			  <h2>Heading</h2>
			  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			  <h2>Heading</h2>
			  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
		   
		</div>
	  <!-- INICIO DA GALERIA-->
	  <hr class="featurette-divider">
	   <a name="obras"></a> <!-- Link usado para fazer a ancora do menu-->
	  
	  <!-- Three columns of text below the carousel -->
	   <div class="row featurette">
		 <h1>OBRAS</h1>
		<?php
			$Midia->mostrarGaleria();
				
		?>
	  </div>
	  
	  
	  <hr class="featurette-divider">
	  
	  <!-- INICIO DO FORMULARIO DE CONTATO-->
	  <a name="contato"></a> <!-- Link usado para fazer a ancora do menu-->
	<div class="row featurette">
        <div class="col-md-7">
			 <h2 class="featurette-heading">CONTATO</h2>
			<form action="contato.php" method="POST">
				<table id="tabelaContato">
					<tr>
						<td><label>Nome:</label></td>
						<td><input type="text" name="nomeCliente" placeholder="Insira seu nome"></td>
					</tr>
					
					<tr>
						<td><label>Telefone:</label></td>
						<td><input type="text" name="telefoneCliente" maxlength="10" placeholder="(XXX) XXXX-XXXX"></td>
					</tr>
					
					<tr>
						<td><label>Email:</label></td>
						<td><input type="text" name="emailCliente" placeholder="Insira seu email"></td>
					</tr>
					
					<tr>
						<td><label>Descrição:</label></td>
						<td><textarea name="descricaoCliente" placeholder="Informe a descrição"></textarea></td>
					</tr>
					
					<tr>
						<td><input type="file" name="Arquivo" value="Anexar arquivo"></td>
					</tr>
					
					<tr>
						<td><input type="submit" value="Enviar"></td>
					</tr>
				
				</table>
			</form>
        </div>
	</div>
	<hr class="featurette-divider">
	<div class="row featurette">
        <div class="col-md-7">
			 <h2 class="featurette-heading">SERVIÇOS</h2>
        </div>
	</div>
	 
	
	<hr class="featurette-divider">
	<!-- FOOTER -->
	<div id="rodape">
		<p class="pull-right"><a href="#">Back to top</a></p>
        <p>Copyright &copy; 2014 AJB montagens</p>
      </div>
	 
	 
    </div><!-- /.container -->
	
	
	
  </body>
</html>
