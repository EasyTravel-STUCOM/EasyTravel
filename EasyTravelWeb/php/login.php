<?php
session_start();
include("pdo.php");
unset($_SESSION['userToAdd']);



$user = $_POST['user'];
$pwd = $_POST['pwd'];

$stmt = $PDO->prepare("SELECT * FROM Usuario WHERE nombreUsuario = :user");
$stmt->bindValue(':user', $user);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pwdHash = $user[0]['userPassword'];




if (password_verify($pwd, $pwdHash)) {
    $_SESSION['userToAdd']['id'] = $user[0]['idUsuario'];
    $_SESSION['userToAdd']['nombre'] = $user[0]['nombre'];
    $_SESSION['userToAdd']['apellido1'] = $user[0]['apellido1'];
    $_SESSION['userToAdd']['apellido2'] = $user[0]['apellido2'];
    $_SESSION['userToAdd']['verified'] = true;

    echo json_encode($_SESSION['userToAdd']);
}else{
    $_SESSION['userToAdd']['verified'] = false;

    echo json_encode($_SESSION['userToAdd']);
}


// $stmt->bindValue('pwd', $pwd);
