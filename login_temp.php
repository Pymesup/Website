<?php
    session_start();
    include_once 'conexion_dbs/conexion.php';
    $usuario = $_POST['nombre_usuario'];
    $password =$_POST['contrasena'];
    $sql = 'SELECT * FROM usuarios WHERE nick = ?';    
    $sentencia = $pdo->prepare($sql);  
    $sentencia->execute(array($usuario));       // Verificando usuario    
	$resultado = $sentencia->fetch();       // Devuelve arreglo 
	
    if(!$resultado){ ?>
        <script type="text/javascript">
            alert("Usuario o contraseña incorrectos");
            window.location.href="login";
        </script>       		 
    <?php
    die();
    }

    if(password_verify($password, $resultado['contrasena'])){
        $_SESSION['nombre'] = $resultado['nombre_apellido'];
        $_SESSION['imagen'] = $resultado['imagen'];
        $_SESSION['nick'] = $resultado['nick'];
        $_SESSION['id'] = $resultado['id'];
        header('Location:index');       
    }else{ ?>     
        <script type="text/javascript">
            alert("Usuario o contraseña incorrectos");
            window.location.href="login";
        </script>
        <?php 
        die();
	}
?>