<?php
session_start();
include("pdo.php");



$stmt = $PDO->prepare("DELETE FROM Usuario WHERE idUsuario = :id");
$stmt->bindValue(':id', $_SESSION['user']['id']);
$stmt->execute();
session_destroy();
echo "Eliminado";

?>