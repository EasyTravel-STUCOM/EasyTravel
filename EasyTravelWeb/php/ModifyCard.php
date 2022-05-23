<?php
include("pdo.php");



$nombre = $_POST['name'];
$cv = $_POST['cv'];
$fecha = $_POST['fecha'];
$numero = $_POST['numero'];

$stmt = $PDO->prepare("UPDATE TARJETA SET nombre = :nombre, fecha = :fecha, cvc = :cv, numero = :numero");
$stmt->bindValue(':numero',$numero);
$stmt->bindValue(':cv',$cv);
$stmt->bindValue(':fecha',$fecha);
$stmt->bindValue(':nombre',$nombre);
$stmt->execute();





