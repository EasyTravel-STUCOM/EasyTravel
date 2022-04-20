<?php
if (isset($_POST["siguiente"])) {
    header("Location: index.html");
} else if (isset($_POST["atras"])) {
    header("Location: register2.php");
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
        <form  id="formCheck" method="POST">
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
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">ARTE</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">OCIO</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">NIGHT LIFE</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">GASTRONOMIA</label>
                </div>

                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">RURAL</label>
                </div>

                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">NATURALEZA</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">TECNOLOGIA</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">CULTURA</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
                    <label for="arte">EVENTOS</label>
                </div>
                <div class="check">
                    <input type="checkbox" class="check" name="arte[]" id="arte">
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

