<?php

include("pdo.php");

//Hace cambio de contraseña

$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$stmt = $PDO->prepare("UPDATE Usuario SET userPassword = :pwd WHERE nombreUsuario = :user");
$stmt->bindValue(':user', "mullayos");
$stmt->bindValue(':pwd', $pwd);
$stmt->execute();

$stmt = $PDO->prepare("SELECT userPassword FROM Usuario WHERE nombreUsuario = :user");
$stmt->bindValue(':user', "mullayos");
$stmt->execute();


$result['pwd'] = $stmt -> fetch(PDO::FETCH_ASSOC);

echo json_encode($result['pwd']);