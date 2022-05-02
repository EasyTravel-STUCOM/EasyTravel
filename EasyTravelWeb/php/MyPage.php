<?php
session_start();
try {
    $user = "root";
    $password = "nintendo55";
    $dbName = "mysql:host=localhost;port=3306,dbname=EasyTravel";
    $PDO = new PDO($dbName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$_SESSION['user']['name'] = "x";
$_SESSION['user']['surname1'] = "x";
$_SESSION['user']['surname2'] = "x";

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];

if (!empty($apellido2) && empty($nombre) && empty($apellido1)) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = " . $apellido2 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $_SESSION['user']['surname2'] = $apellido2;
}

if (empty($apellido2) && empty($nombre) && !empty($apellido1)) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = " . $apellido1 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $_SESSION['user']['surname1'] = $apellido1;
}

if (empty($apellido2) && !empty($nombre) && empty($apellido1)) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = " . $nombre . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $_SESSION['user']['name'] = $nombre;
}

if (empty($apellido2) && !empty($nombre) && !empty($apellido1)) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = " . $nombre . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = " . $apellido1 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $_SESSION['user']['name'] = $nombre;
    $_SESSION['user']['surname1'] = $apellido1;
}

if (!empty($apellido2) && !empty($nombre) && empty($apellido1)) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = " . $nombre . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = " . $apellido2 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $_SESSION['user']['name'] = $nombre;
    $_SESSION['user']['surname2'] = $apellido2;
}

if (!empty($apellido2) && empty($nombre) && !empty($apellido1)) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = " . $apellido1 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = " . $apellido2 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $_SESSION['user']['surname1'] = $apellido1;
    $_SESSION['user']['surname2'] = $apellido2;
}

if (!empty($apellido2) && !empty($nombre) && !empty($apellido1)) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = " . $apellido1 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = " . $apellido2 . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = " . $nombre . " WHERE idUsuario = " . $_SESSION["user"]["id"]);
    $stmt->execute();
    $_SESSION['user']['name'] = $nombre;
    $_SESSION['user']['surname1'] = $apellido1;
    $_SESSION['user']['surname2'] = $apellido2;
}

echo json_encode($_SESSION['user']);

?>
