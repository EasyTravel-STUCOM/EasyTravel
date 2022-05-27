<?php
session_start();
include("pdo.php");
$_SESSION['userToAdd']['changed'] = false;

//Entra en cada una de estas opciones, y actualiza lo que sea necesario

if (isset($_POST['apellido2'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':apellido2', $_POST['apellido2']);
    $stmt->execute();
    $_SESSION['userToAdd']['apellido2'] = $_POST['apellido2'];
    $_SESSION['userToAdd']['changed'] = true;
}

if (isset($_POST['apellido1'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();
    $_SESSION['userToAdd']['apellido1'] = $_POST['apellido1'];
    $_SESSION['userToAdd']['changed'] = true;
}

if (isset($_POST['nombre'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();
    $_SESSION['userToAdd']['nombre'] = $_POST['nombre'];
    $_SESSION['userToAdd']['changed'] = true;
}

if ((isset($_POST['nombre']) && isset($_POST['apellido1']))) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();

    $_SESSION['userToAdd']['nombre'] = $_POST['nombre'];
    $_SESSION['userToAdd']['apellido1'] = $_POST['apellido1'];
    $_SESSION['userToAdd']['changed'] = true;
}

if (isset($_POST['apellido2']) && isset($_POST['nombre'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':apellido2', $_POST['apellido2']);
    $stmt->execute();

    $_SESSION['userToAdd']['nombre'] = $_POST['nombre'];
    $_SESSION['userToAdd']['apellido2'] = $_POST['apellido2'];
    $_SESSION['userToAdd']['changed'] = true;
}

if (isset($_POST['apellido2']) && isset($_POST['apellido1'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue('apellido2', $_POST['apellido2']);
    $stmt->bindValue('id', $_SESSION['userToAdd']['id']);
    $stmt->execute();
    $_SESSION['userToAdd']['apellido1'] = $_POST['apellido1'];
    $_SESSION['userToAdd']['apellido2'] = $_POST['apellido2'];
    $_SESSION['userToAdd']['changed'] = true;
}

if (isset($_POST['apellido2']) && isset($_POST['nombre']) && isset($_POST['apellido1'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue(':apellido2', $_POST['apellido2']);
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();

    $_SESSION['userToAdd']['nombre'] = $_POST['nombre'];
    $_SESSION['userToAdd']['apellido1'] = $_POST['apellido1'];
    $_SESSION['userToAdd']['apellido2'] = $_POST['apellido2'];
    $_SESSION['userToAdd']['changed'] = true;
}

echo json_encode($_SESSION['userToAdd']);
