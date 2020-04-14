<?php
	session_start(); 
	if(isset($_SESSION['nombre'])){
	header('Location:index');
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Monkapp Login</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-5">     
    </div>
    <div class="col-2 color2">
        <img src="img/monkapp.png" class="img-fluid" alt="Responsive image">
    </div>
    <div class="col-5">
    </div>
  </div>
</div>
<div class="container"> 
	<div class="card bg-light">
	<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Inicia sesión en Monkapp</h4>
	<p class="text-center">Descubre...</p>
	<p class="divider-text">
    </p>
	<form action="login_temp" method="POST">	
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="nombre_usuario" placeholder="Nombre de usuario" type="text" required>
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="contrasena" class="form-control" placeholder="Contraseña" type="password" required>
    </div> <!-- form-group// -->   
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Ingresar </button>
    </div> <!-- form-group// -->     
    <p class="text-center">¿No tienes cuenta? <a href="registro">Registrarse</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//--> 
	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>
