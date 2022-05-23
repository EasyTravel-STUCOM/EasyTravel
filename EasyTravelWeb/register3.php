<?php
session_start();
var_dump($_SESSION);
try {
    $user = "adminuser";
    $password = "admin123";
    $dataName = "mysql:host=localhost; port = 3306; dbname=easytravelst2122";
    $dbh = new PDO($dataName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}


//metodo para insertar usuario


if (isset($_POST['siguiente'])) {
    $interest = $_POST['intereses'];
    //inserta usuario
    $insertUsuario = "INSERT INTO usuario(nombre,apellido1,apellido2,fechaDeNacimiento,mail,nombreUsuario,userPassword)
    VALUES(:nombre,:apellido1,:apellido2,:fechaDeNacimiento,:mail,:nombreUsuario,:userPassword)";
    $insert = $dbh->prepare($insertUsuario);
    $insert->execute(array(
        ":nombre" => $_SESSION['userToAdd']['nombre'],
        ":apellido1" => $_SESSION['userToAdd']['apellido1'],
        ":apellido2" => $_SESSION['userToAdd']['apellido2'],
        ":fechaDeNacimiento" => $_SESSION['userToAdd']['fechaDeNacimiento'],
        ":mail" => $_SESSION['userToAdd']['mail'],
        ":nombreUsuario" => $_SESSION['userToAdd']['user'],
        ":userPassword" => $_SESSION['userToAdd']['password']
    ));

    //insertamos usuario_interes
    $stmtSearchUser = $dbh->prepare("SELECT idUsuario FROM usuario WHERE nombreUsuario = :nUsuario");
<<<<<<< HEAD
    $stmtSearchUser->bindValue(":nUsuario", $_SESSION['user']['id']);
=======
    $stmtSearchUser->bindValue(":nUsuario", $_SESSION['userToAdd']['user']);
>>>>>>> 83d0539803bfa55f201d06aa2168925000f53661
    $stmtSearchUser->execute();
    $newUser = $stmtSearchUser->fetchAll(PDO::FETCH_ASSOC);
    $idNewUser = $newUser[0]['idUsuario'];

    foreach ($interest as $i) {
        switch ($i) {
            case "arte":
                $intereses[] = 1;
                break;
            case "nightLife":
                $intereses[] = 2;
                break;
            case "rural":
                $intereses[] = 3;
                break;
            case "tecnologia":
                $intereses[] = 4;
                break;
            case "eventos":
                $intereses[] = 5;
                break;
            case "ocio":
                $intereses[] = 6;
                break;
            case "gastronomia":
                $intereses[] = 7;
                break;
            case "naturaleza":
                $intereses[] = 8;
                break;
            case "cultura":
                $intereses[] = 9;
                break;
            case "deporte":
                $intereses[] = 10;
                break;
        }
    }
    foreach ($intereses as $i) {
        $insertInteresesActividades = $dbh->prepare("INSERT INTO usuariointeres VALUES($i,$idNewUser)");
        $insertInteresesActividades->execute();
    }
    header("Location: index.php");
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
    <script src="js/register3.js" defer></script>
</head>

<body>
    <div class="contenedor">
        <form id="formCheck" method="POST">
            <div class="titulo">
                <h1>EASY TRAVEL</h1>
            </div>

            <div class="titulo2">
                <h2>Make your travel easy</h2>
            </div>

            <div class="texto">
                <p class="bold">Bienvenido a EASY TRAVEL</p>
                <p>Como último paso, porfavor selecciona tus intereses para<br>
                    ofrecerte una experiencia más personalizada </p>
            </div>
            <div class="span">
                <span id="span" style="display:none">Selecciona por lo menos uno</span>
            </div>

            <div class="grid-checkbox">

                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="arte">
                    <label for="arte">ARTE</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="ocio">
                    <label for="arte">OCIO</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="nightLife">
                    <label for="arte">NIGHT LIFE</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="gastronomia">
                    <label for="arte">GASTRONOMIA</label>
                </div>

                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="rural">
                    <label for="arte">RURAL</label>
                </div>

                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="naturaleza">
                    <label for="arte">NATURALEZA</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="tecnologia">
                    <label for="arte">TECNOLOGIA</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="cultura">
                    <label for="arte">CULTURA</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="eventos">
                    <label for="arte">EVENTOS</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="intereses[]" id="arte" value="deporte">
                    <label for="arte">DEPORTE</label>
                </div>
            </div>


            <h3 id="addInterest">¿Hechas de menos algún interés?</h3>
            <p id="introduceHere">Puedes hacer que aparezca introduciendola aquí</p>
            <input type="text" name="interest" id="interest">

            <div class="contenedor-atras-siguiente">
                <div class="atras">
                    <input class="begin" type="submit" name="atras" value="Atras">
                </div>

                <div class="enviar">
                    <input disabled="disabled" id="boton" class="submit " type="submit" name="siguiente" value="Registrame">
                </div>
            </div>
        </form>
    </div>

</body>