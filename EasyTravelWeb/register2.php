<?php 
    session_start();
    if(isset($_POST['siguiente'])){
    $password = $_POST['confirmPassword'];
    $_SESSION['userToAdd']['nombreUsuario'] = $_POST['name']; 
    $_SESSION['userToAdd']['password'] = password_hash($password,PASSWORD_DEFAULT); 
    }
    

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Travel - Register</title>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <script src="js/jquery-validation-1.19.3/dist/additional-methods.min.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Quicksand:wght@300&family=Satisfy&display=swap" rel="stylesheet">
    <script src="js/register2.js" defer></script>
</head>

<body>
    <div class="contenedor">
        <form action="register2.php" id="userFrom" method="POST">
            <div class="titulo">
                <h1>EASY TRAVEL</h1>
            </div>

            <div class="titulo2">
                <h2>Make your travel easy</h2>
            </div>

            <div class="texto">
                <p class="bold">Bienvenido a EASY TRAVEL</p>
                <p>Por favor, rellena los siguientes datos para poder registrarte</p>
            </div>

            <div class="campo">
                <img src="img/user icon.svg" alt="user icon " class="userIcon primero">
                <label for="name">INSERTA UN NOMBRE DE USUARIO:</label> <br>
                <input type="text" name="user" id="name">
            </div>

            <div class="campo">
                <img src="img/user icon.svg" alt="user icon" class="userIcon">
                <label for="secondName">INSERTA UNA CONTRASEÑA:</label> <br>
                <input type="password" name="password" id="secondName" class="confirmPassword">
            </div>

            <div class="campo">
                <img src="img/user icon.svg" alt="user icon" class="userIcon">
                <label for="secondName">REPITA LA CONTRASEÑA:</label> <br>
                <input type="password" name="confirmPassword" id="secondName">
            </div>

            <div class="contenedor-atras-siguiente-2">
                <div class="atras">
                    <input class="begin" type="submit" name="atras" value="Atras">
                </div>

                <div class="enviar">
                    <input class="submit " type="submit" name="siguiente" value="Siguiente">
                </div>
            </div>
        </form>
    </div>
</body>

<?php
if (isset($_POST["siguiente"])) {
    header("Location: register3.php");
} else if (isset($_POST['atras'])) {
    header("Location: register.html");
}
?>