<?php

try {
    $user = "root";
    $password = "";
    $dbName = "mysql:host=localhost;dbname=EasyTravel";
    $PDO = new PDO($dbName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$stmt = $PDO->prepare("UPDATE Usuario SET userPassword = :pwd WHERE nombreUsuario = :user");
$stmt->bindValue(':user', "mullayos");
$stmt->bindValue(':pwd', $pwd);
$stmt->execute();


$result = $stmt -> fetch(PDO::FETCH_ASSOC);
var_dump($result);
echo json_encode($result);