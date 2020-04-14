<?php
        session_start();
        include_once 'conexion_dbs/conexion.php';       
        $sql = 'SELECT * FROM usuarios WHERE nick = ?';    
        $sentencia = $pdo->prepare($sql);  
        $sentencia->execute(array($_SESSION['nick']));       // Verificando usuario    
        $resultado = $sentencia->fetch();

        $type = 'jpg';
        $rfoto = $_FILES['avatar']['tmp_name'];
        $name = $_SESSION['id'].'.'.$type;
        if(is_uploaded_file($rfoto)){
            $destino = 'img_perfil/'.$name;
            $nombrea = $name;
            copy($rfoto, $destino);           
        }else{
            $nombrea = $resultado['imagen'];
        }
        $sql = 'UPDATE usuarios SET imagen = ? WHERE nick = ?';    
        $sentencia = $pdo->prepare($sql);  
        $sentencia->execute(array($name, $_SESSION['nick']));
        ?>
        <script type = "text/javascript">
            alert("En breve se actualizará su nueva foto de perfil =)");
            window.location.href = "index";
        </script>
       
        