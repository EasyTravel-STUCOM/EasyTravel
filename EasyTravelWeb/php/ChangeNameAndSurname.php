<?php
session_start();
try {
    $user = "root";
    $password = "";
    $dbName = "mysql:host=localhost;dbname=EasyTravel";
    $PDO = new PDO($dbName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$_SESSION['user']['name'] = "x";
$_SESSION['user']['surname1'] = "x";
$_SESSION['user']['surname2'] = "x";
$_SESSION['user']['changed'] = false;


$_SESSION['user']['id'] = 5;



if (isset($_POST['apellido2'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':apellido2', $_POST['apellido2']);
    $stmt->execute();
    $_SESSION['user']['surname2'] = $_POST['apellido2'];
    $_SESSION['user']['changed'] = true;
}

if (isset($_POST['apellido1'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();
    $_SESSION['user']['surname1'] = $_POST['apellido1'];
    $_SESSION['user']['changed'] = true;
}

if (isset($_POST['nombre'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();
    $_SESSION['user']['name'] = $_POST['nombre'];
    $_SESSION['user']['changed'] = true;
}

if ((isset($_POST['nombre']) && isset($_POST['apellido1']))) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();

    $_SESSION['user']['name'] = $_POST['nombre'];
    $_SESSION['user']['surname1'] = $_POST['apellido1'];
    $_SESSION['user']['changed'] = true;
}

if (isset($_POST['apellido2']) && isset($_POST['nombre'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':apellido2', $_POST['apellido2']);
    $stmt->execute();

    $_SESSION['user']['name'] = $_POST['nombre'];
    $_SESSION['user']['surname2'] = $_POST['apellido2'];
    $_SESSION['user']['changed'] = true;
}

if (isset($_POST['apellido2']) && isset($_POST['apellido1'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue('apellido2', $_POST['apellido2']);
    $stmt->bindValue('id', $_SESSION['user']['id']);
    $stmt->execute();
    $_SESSION['user']['surname1'] = $_POST['apellido1'];
    $_SESSION['user']['surname2'] = $_POST['apellido2'];
    $_SESSION['user']['changed'] = true;
}

if (isset($_POST['apellido2']) && isset($_POST['nombre']) && isset($_POST['apellido1'])) {
    $stmt = $PDO->prepare("UPDATE Usuario SET apellido2 = :apellido2 WHERE idUsuario = :id");
    $stmt->bindValue(':apellido2', $_POST['apellido2']);
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET nombre = :nombre WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->execute();

    $stmt = $PDO->prepare("UPDATE Usuario SET apellido1 = :apellido1 WHERE idUsuario = :id");
    $stmt->bindValue(':id', $_SESSION['user']['id']);
    $stmt->bindValue(':apellido1', $_POST['apellido1']);
    $stmt->execute();

    $_SESSION['user']['name'] = $_POST['nombre'];
    $_SESSION['user']['surname1'] = $_POST['apellido1'];
    $_SESSION['user']['surname2'] = $_POST['apellido2'];
    $_SESSION['user']['changed'] = true;
}

echo json_encode($_SESSION['user']);
