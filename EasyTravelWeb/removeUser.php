<?php
include("php/pdo.php");

if (isset($_POST['deleteButton'])) {
    $id = $_GET['id'];
    $deleteUser = $dbh->prepare("DELETE FROM usuario WHERE idUsuario = :id");
    $deleteUser->bindValue(":id", $id);
    $deleteUser->execute();
    header("Location: adminView.php");
}
if (isset($_POST['cancel'])) {
    header("Location: adminView.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method='POST'>
        <h1>¿Estas seguro que quieres eliminar a este usuario?</h1>
        <input type="submit" value="Cancelar" name="cancel">
        <input type="submit" value="Eliminar" name="deleteButton">
    </form>
</body>

</html>