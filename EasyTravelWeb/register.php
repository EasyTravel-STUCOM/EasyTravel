<?php
try {
    $user = "adminuser";
    $password = "admin123";
    $dataName = "mysql:host=localhost; port = 3306; dbname=easytravelst2122";
    $dbh = new PDO($dataName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}




function conexion($dbh){
    $insertar = $dbh->prepare();
} 


session_start();
if (isset($_POST['nextButton'])) {
    unset($_SESSION);
    $stmtComprMail = "SELECT * FROM usuario WHERE mail = :email";
    $compMail = $dbh->prepare($stmtComprMail);
    $compMail->bindValue(":email", $_POST['mail']);
    $compMail->execute();
    $mails = $compMail->fetchAll(PDO::FETCH_ASSOC);
    !empty($mails) ? $mailRepetido = true : $mailRepetido = false;
    if(!$mailRepetido){
        $_SESSION['userToAdd']['nombre'] = $_POST['name'];
        $_SESSION['userToAdd']['apellido1'] = $_POST['secondName'];
        $_SESSION['userToAdd']['apellido2'] = $_POST['thirdName'];
        $_SESSION['userToAdd']['fechaDeNacimiento'] = $_POST['birthday'];
        $_SESSION['userToAdd']['mail'] = $_POST['mail'];
        header("Location: register2.php");
    }else{
        $_SESSION['error']['mailRepeated'] = true;
    }
    
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
    <script src="js/register.js" defer></script>
</head>

<body>

    <div class="contenedor">
        <form id="userFrom" method="POST">
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

            <div class="campo user1">
                <img src="img/user icon.svg" alt="user icon " class="userIcon primero">
                <label for="name">INSERTA TU NOMBRE:</label> <br>
                <input type="text" name="name" id="name">
            </div>

            <div class="campo">
                <img src="img/user icon.svg" alt="user icon" class="userIcon">
                <label for="secondName">INSERTA TU PRIMER APELLIDO:</label> <br>
                <input type="text" name="secondName" id="secondName">
            </div>

            <div class="campo">
                <img src="img/user icon.svg" alt="user icon" class="userIcon tercero">
                <label for="thirdName" class="second-name">INSERTA TU SEGUNDO APELLIDO:</label> <br>
                <input type="text" name="thirdName" id="thirdName">
            </div>

            <div class="campo">
                <img src="img/user icon.svg" alt="user icon" class="userIcon tercero">
                <label for="mail" class="second-name">INSERTA TU CORREO ELECTRONICO:</label> <br>
                <input type="mail" name="mail" id="mail">
                <?php 
                if(isset($_SESSION['error']['mailRepeated']) && $_SESSION['error']['mailRepeated']){
                    echo "<h4>Este mail ya esta registrado</h4> ";
                }
                ?>
            </div>

            <div class="campo">
                <img src="img/" alt="">
                <label for="birthday" class="text-birthday">INSERTA TU FECHA DE NACIMIENTO:</label><br>
                <input type="date" name="birthday" id="birthday">
            </div>

            <div class="enviar">
                <input class="submit " type="submit" name="nextButton" value="Siguiente">
            </div>
        </form>
    </div>

    <div class="cookies">
        <div class="cookies_p">
            <p>
                Utilizamos cookies propias y de terceros durante la navegación por el sitio web, con la finalidad de permitir el acceso a las funcionalidades de la página web, extraer estadísticas de tráfico y mejorar la experiencia del usuario. Puedes aceptar todas las cookies, así como seleccionar cuáles deseas habilitar o configurar sus preferencias. Para más información, puede consultar nuestra <a href="#">Política de cookies</a>
            </p>
        </div>

        <div class="cookies_aceptarRechazar">
            <button>Aceptar</button>
            <button>Aceptar mínimos</button>
        </div>


    </div>


</body>