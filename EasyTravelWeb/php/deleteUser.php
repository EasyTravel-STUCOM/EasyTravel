<?php
session_start();
include("pdo.php");



$stmt = $PDO->prepare("DELETE FROM Usuario WHERE idUsuario = :id");
$stmt->bindValue(':id', $_SESSION['userToAdd']['id']);
$stmt->execute();
session_destroy();
$eliminado['user']['eliminado'] =  true;
echo json_encode($eliminado['user']);
?>