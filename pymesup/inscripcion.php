<?php
    session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

    <title>Pymesup</title>
  </head>
  <body>
      <?php include_once("../navbar.php");
      echo navBar(1);?>
      
  	<?php include_once("header.php");?>

	  <nav>
			<ul id="menu">
				<li><a href="index.php">INICIO</a></li>
				<li><a href="about.php">SOBRE NOSOTROS</a></li>
			</ul>
		</nav><br>

		<div class="container">
		
    		<main>
    		    
        <div class="container">
	        <div class="card bg-light">
	          <article class="card-body mx-auto" style="max-width: 400px;">
	          <h4 class="card-title mt-3 text-center">Registra tu empresa!</h4>
	          <p class="text-center">un servicio de Monkapp&reg </p>
	          <p class="divider-text">
            </p>
	        <form action="registro_temp" method="POST">
	        <div class="form-group input-group">
		        <div class="input-group-prepend">
		          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		        </div>
			<input name="nombre_empresa" class="form-control" placeholder="Nombre de la empresa" type="text" value = "<?php echo $_POST['nombre_empresa'];?>" required>
			</div> <!-- form-group// -->
			<div class="form-group input-group">
    	      <div class="input-group-prepend">
		          <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		        </div>
              <input name="rubro" class="form-control" placeholder="Rubro" type="text" value = "<?php echo $_POST['rubro'];?>" required>
	        </div>

          <button type="submit" class="btn btn-primary btn-block"> Enviar datos  </button>
    
    
    		</main>
		
		</div>

	<?php include_once("footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>