<?php
 try {
    $user = "root";
    $password = "Pokemon26!";
    $dataName = "mysql:host=localhost; port = 3306; dbname=easytravelst2122";
    $dbh = new PDO($dataName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

   
    $insert_query= "INSERT INTO contactUs VALUES(:nombre,:correo,:mensaje)";
    $stmt = $dbh->prepare($insert_query);
    $stmt->execute(array(
        ":nombre" =>$name,
        ":correo"=>$email,
        ":mensaje"=>$message
    ));

    
    
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contactUs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Quicksand:wght@300&family=Satisfy&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="grid-cabecera">
            <div class="hamburguer-menu">
                <img src="img/hamburger menu.png" alt="menu">
            </div>

            <div class="logo">
                <h1>EASY TRAVEL</h1>
                <h2>Make your travel easy</h2>
            </div>

            <div class="login-register">
                <button class="register">
                    <a href="">Regístrate</a>
                </button>

                <p>o</p>

                <button class="login">
                    <a href="">Inicia sesión</a>
                </button>
            </div>

            <div class="account">
                <img src="img/user icon.svg" alt="My account">
            </div>
        </div>


    </header>

    <div class="contenedor-nav">
        <nav class="nav-principal">
            <a href="">Home</a>
            <a href="">Planificador</a>
            <a href="">Organiza tu viaje</a>
            <a href="">About Us</a>
            <a href="">Contact Us</a>
        </nav>
    </div>

    <main>
        <div class="contenedor">
            <div class="flex-contactUs">
                <div class="elemento1">
                    <h1 class="nunito-20px titlesProperties">Talk with us</h1>
                    <p class="quickSand-16px">Don’t hesitate to contact us if you have any doubts!</p>
                </div>

                <div class="elemento">
                    <form class="formulario" method="POST">
                        <fieldset>
                            <legend class="nunito-20px">CONTACT US</legend>

                            <div class="campo">
                                <label for="name" class="quickSand-16px">Your name:</label>
                                <input type="text" name="name" id="name" required>
                            </div>

                            <div class="campo">
                                <label for="email" class="quickSand-16px">Your email:</label>
                                <input type="email" name="email" id="email" required>
                            </div>

                            <div class="campo">
                                <label for="message" class="quickSand-16px">Put here your dubt:</label>
                                <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                            </div>

                        </fieldset>
                        <input type="submit" value="SEND" class="send nunito-20px" name="send">
                        <?php 
                        
                            if (isset($_POST["send"])){
                                echo "Mensaje enviado!";
                        }?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="site-footer">
        <div class="grid-footer contenedor">
            <div>
                <h3>Conócenos</h3>
                <nav class="footer-menu">
                    <a href="">About Us</a>
                    <a href="">Política de Privacidad</a>
                    <a href="">Términos del servicio</a>
                </nav>

            </div>

            <div>
                <h3>Follow Us</h3>
                <nav class="footer-menu">
                    <a href="">Instagram</a>
                    <a href="">Facebook</a>
                    <a href="">Twitter</a>
                </nav>

            </div>

            <div>
                <h3>Soporte</h3>
                <nav class="footer-menu">
                    <a href="">FAQs</a>
                    <a href="">Contact us</a>
                    <a href="">Confianza y seguridad</a>
                </nav>
            </div>
        </div>

        <p class="copyright"> Todos los derechos reservados, EasyTravel</p>

    </footer>
</body>

</html>