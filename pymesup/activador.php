<?php 

session_start();

include_once '../conexion_dbs/conexion.php';

$nombre = $_SESSION['nombre'];

$res = mysql_query("SELECT id FROM usuarios WHERE nombre_apellido='$nombre' ");
$result = mysql_fetch_array($res);

$sql = 'UPDATE usuarios SET pymesup='1' WHERE id='$result' ';

header('Location: inscripcion.php');

?>