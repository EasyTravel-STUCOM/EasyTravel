<?php

try{
    $user = "root"; 
    $password = " ";
    $dbName = "mysql:host=localhost;port=3306,dbname=EasyTravel";
    $PDO = new PDO($dbName, $user, $password);
}catch(PDOException $e){
    echo $e->getMessage();
}

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];

if(!empty($apellido2)){
    
}

?>