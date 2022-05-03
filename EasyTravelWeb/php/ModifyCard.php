<?php
try {
    $user = "root";
    $password = "";
    $dbName = "mysql:host=localhost;dbname=EasyTravel";
    $PDO = new PDO($dbName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}


$nombre = $_POST['name'];
$cv = $_POST['cv'];
$fecha = $_POST['fecha'];
$numero = $_POST['numero'];

$stmt = $PDO->prepare("SELECT nombre FROM TARJETA WHERE numero = :numero");
$stmt->bindValue(':numero',$numero);
