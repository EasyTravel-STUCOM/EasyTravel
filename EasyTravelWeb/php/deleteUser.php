<?php
session_start();
include("pdo.php");

//Elimina usuario

$stmt = $PDO->prepare("DELETE FROM Usuario WHERE nombreUsuario = :user");
$stmt->bindValue(':user', $_SESSION['userToAdd']['user']);
$stmt->execute();
session_destroy();
$eliminado['user']['eliminado'] =  true;
echo json_encode($eliminado['user']);
?>