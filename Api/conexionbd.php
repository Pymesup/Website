<?php
    $link = 'mysql:host=localhost;dbname=usuario';
    $user = 'root';
    $pass = 'root';

    try{
        $pdo = new PDO($link, $user, $pass);
        //echo 'conectado';
    }catch (PDOException $e){
        print "Error: " . $e->getMessage() . "<br/>";  
        die();
    }
?>