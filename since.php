<?php
$fecha1= new DateTime("2019-11-13");
$fecha2= new DateTime(date("Y")."-".date("m")."-".date("d"));
$diff = $fecha1->diff($fecha2);

echo $diff->days . ' dias';
?>