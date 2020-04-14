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
      
  	<header><h1>Pymesup </h1></header>

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
	          <h4 class="card-title mt-3 text-center">Crea tu cuenta en MonkApp</h4>
	          <p class="text-center">Únete...</p>
	          <p class="divider-text">
            </p>
	        <form action="registro_temp" method="POST">
	        <div class="form-group input-group">
		        <div class="input-group-prepend">
		          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		        </div>
          <input name="nombre_apellido" class="form-control" placeholder="Nombre y Apellido" type="text" value = "<?php echo $_POST['nombre_apellido'];?>" required>
          </div> <!-- form-group// -->
          <div class="form-group input-group">
    	      <div class="input-group-prepend">
		          <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		        </div>
              <input name="correo" class="form-control" placeholder="Email address" type="email" value = "<?php echo $_POST['correo'];?>" required>
	        </div>
	        <div class="form-group input-group">
    	      <div class="input-group-prepend">
		          <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		        </div>
            <input class="form-control" name="nombre_usuario" placeholder="Nombre de usuario" type="text"  minlenght="4" value = "<?php echo $_POST['nombre_usuario'];?>" required>
          </div>
        <div class="form-group input-group">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		      </div>
            <input name="contrasena" class="form-control" placeholder="Crear contraseña" type="password" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
    	    <div class="input-group-prepend">
		        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		      </div>
            <input class="form-control" name="contrasena2" placeholder="Repetir contraseña" type="password" required>
        </div> <!-- form-group// -->                                      
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block"> Crear Cuenta  </button>
    
    
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