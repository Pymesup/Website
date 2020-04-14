<?php 

session_start();

include_once '../conexion_dbs/conexion.php';

if (!isset($_SESSION['nombre'])){

    echo '<a href="../login.php"><button class="boton centrado" style="cursor:pointer" " ><h1>Inicia sesión en Monkapp</h1></button></a>';

}else{

    $valida = $_POST['pymesup'];

    if ($valida == 1){
        echo '<a href="tablero.php" ><button class="boton centrado" style="cursor:pointer" " ><h1>Mis empresas</h1></button></a>';
    }else{
        echo '<a href="activador.php" ><button class="boton centrado" style="cursor:pointer" OnClick="location.href="activador.php" " ><h1>Activar servicio Pymesup</h1></button></a>';
    }
}
?>