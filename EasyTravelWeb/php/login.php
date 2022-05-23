<?php
session_start();
include("pdo.php");



$user = $_POST['user'];
$pwd = $_POST['pwd'];

$stmt = $PDO->prepare("SELECT * FROM Usuario WHERE nombreUsuario = :user");
$stmt->bindValue(':user', $user);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pwdHash = $user[0]['userPassword'];




if (password_verify($pwd, $pwdHash)) {
    unset($_SESSION['user']);
    $_SESSION['user']['id'] = $user[0]['idUsuario'];
    $_SESSION['user']['nombre'] = $user[0]['nombre'];
    $_SESSION['user']['apellido1'] = $user[0]['apellido1'];
    $_SESSION['user']['apellido2'] = $user[0]['apellido2'];
    echo json_encode($_SESSION['user']);
}else{
    echo("Contraseña incorrecta");
}


// $stmt->bindValue('pwd', $pwd);
