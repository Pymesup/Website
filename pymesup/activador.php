<?php 

session_start();
include_once 'conexion_dbs/conexion.php';

$id_user = $_POST['id'];

$res = mysql_query("SELECT id FROM usuarios WHERE nick='$id_user' ");
$result = mysql_fetch_array($res);

$sql = 'UPDATE usuarios SET pymesup='1' WHERE id='$result' ';

header('Location: inscripcion.php');

?>