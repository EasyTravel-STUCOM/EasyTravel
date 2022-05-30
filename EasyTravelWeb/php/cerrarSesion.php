<?php
session_start();
//Simplemente cierra sesión
unset($_SESSION['userToAdd']);
$sesion['sesion']['cerrada'] = true;
echo json_encode($sesion['sesion']);
?>