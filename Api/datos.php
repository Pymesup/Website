<?php 
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *");
    
    include_once 'conexionbd.php';
    
    if($_GET['dato'] == 'usuarios'){

        $sql = 'SELECT id, nombre_apellido FROM '.$_GET['dato'];
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();
        $datos = $sentencia->fetchAll();
        
    }
    echo json_encode($datos);
?>