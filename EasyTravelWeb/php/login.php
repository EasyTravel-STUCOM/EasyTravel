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
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($user);
$pwdHash = $user[0]['userPassword'];


echo("<br>");
echo($pwd);
echo("<br>".$pwdHash);
echo gettype($pwd);  
echo gettype($pwdHash);

if (password_verify($pwd, $pwdHash)) {
    $_SESSION['user']['name'] = $user['name'];
    $_SESSION['user']['surname1'] = $user['apellido1'];
    $_SESSION['user']['surname2'] = $user['apellido2'];
    echo json_encode($user);
}else{
    echo("Contraseña incorrecta");
}


// $stmt->bindValue('pwd', $pwd);
