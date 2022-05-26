<?php
session_start();
include("pdo.php");



$nombre = $_POST['name'];
$cv = $_POST['cv'];
$fecha = $_POST['fecha'];
$numero = $_POST['numero'];
$stmt = $PDO->prepare("SELECT * FROM TARJETA WHERE id = :id");
$stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
$stmt->execute();


$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
!empty($array) ? $existe = true : $existe = false;

if ($existe) {
    $stmt = $PDO->prepare("UPDATE TARJETA SET nombre = :nombre, fecha = :fecha, cvc = :cv, numero = :numero WHERE idUsuario = :id");
    $stmt->bindValue(':numero', $numero);
    $stmt->bindValue(':cv', $cv);
    $stmt->bindValue(':fecha', $fecha);
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->execute();
}else{
    $stmt = $PDO->prepare("INSERT INTO TARJETA (idUsuario, nombre, fecha, cvc, numero) VALUES(:id, :nombre, :fecha, :cv, :numero)");
    $stmt->bindValue(':numero', $numero);
    $stmt->bindValue(':cv', $cv);
    $stmt->bindValue(':fecha', $fecha);
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->execute();

}


unset($array);
$stmt = $PDO->prepare("SELECT * FROM TARJETA WHERE idUsuario = :id");
$stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($array);