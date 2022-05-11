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


$user = $_POST['user'];
$pwd = $_POST['pwd'];

$stmt = $PDO->prepare("SELECT * FROM Usuario WHERE nombreUsuario = :user");
$stmt->bindValue(':user', $user);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);



if (password_verify($pwd, $user['userPassword'])) {
    $_SESSION['user']['name'] = $user[$i]['name'];
    $_SESSION['user']['surname1'] = $user[$i]['apellido1'];
    $_SESSION['user']['surname2'] = $user[$i]['apellido2'];
}

// $stmt->bindValue('pwd', $pwd);
