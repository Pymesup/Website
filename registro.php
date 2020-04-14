<?php 
	session_start(); 
	if(isset($_SESSION['user'])){
		header('Location:index');
	}
?>	
<!DOCTYPE html>
<html lang = "es">
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Monkapp Registro</title>
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
    </div> <!-- form-group// -->      
    <p class="text-center">¿Ya tienes cuenta? <a href="login">Ingresar</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->
</div> 
<!--container end.//-->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
