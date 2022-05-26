<?php
session_start();

unset($_SESSION['userToAdd']);
$sesion['sesion']['cerrada'] = true;
echo json_encode($sesion['sesion']);
?>