<?php
    include_once 'conexion_dbs/conexion.php';
    $usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $nya = $_POST['nombre_apellido'];
    $contrasena = $_POST['contrasena'];
    $contrasena2 = $_POST['contrasena2'];
    if($usuario != null && $correo != null && $nya != null && $contrasena != null && $contrasena2 != null){
		
    $sql = 'SELECT * FROM usuarios WHERE nick = ?';     
    $sentencia = $pdo->prepare($sql);   
    $sentencia->execute(array($usuario));       // Verificando usuario duplicado  
	$resultado = $sentencia->fetch();       // Devuelve arreglo 
	  
	$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

	if($resultado){           // en caso de ya estar en uso el user alerta al usuario ?>
    		<script type="text/javascript">   
                    alert("Usuario ya en uso");
                    window.location.href="registro";
            </script>
			
		<?php die();
	}else{
		$sql1 = 'SELECT * FROM usuarios WHERE correo = ?';     
    	$sentencia1 = $pdo->prepare($sql1);   
    	$sentencia1->execute(array($correo));       // Verificando usuario duplicado  
    	$resultado1 = $sentencia1->fetch();       // Devuelve arreglo   
		
		if($resultado1){ // en caso de ya estar en uso el correo alerta al usuario 
		?>                    
        	<script type="text/javascript">   
                    alert("Correo ya en uso");
                    window.location.href="registro";
            </script>
			<?php 
			die();			
    	}else{
			if(password_verify($contrasena2, $contrasena)){
				$sentencia = 'INSERT INTO usuarios(nick, contrasena, nombre_apellido, correo, imagen) VALUES (?, ?, ?, ?, ?)';
        		$s = $pdo->prepare($sentencia);
        		$s->execute(array($usuario, $contrasena, $nya, $correo, "default.png"));      // Registrando usuario en database 
        		$s = NULL;
                $pdo = NULL; // Cierra conexion
                ?>    
        		<script type="text/javascript">   
                    alert("Registro satisfactorio");
                    window.location.href="login";
                </script>         // sign up satisfactorio
                <?php
			}else{
				$s = NULL;
        		$pdo = NULL; // Cierra conexion      // en caso de las pass no ser iguales alerta al usuario
				?> 
				<script type="text/javascript">   
                    alert("Ingrese contraseña iguales");
                    window.location.href="registro";
                </script> 
                <?php
		    } 
	} 
}
	}  
?>