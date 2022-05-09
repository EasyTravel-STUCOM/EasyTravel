<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add activity</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form action="actividades.php" method="POST" class="formulario">
        <fieldset>
            <legend>Add activity</legend>

            <div class="campo">
                <label for="nombre">Activity Name</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>

            <div class="campo">
                <label for="precio">Prize</label>
                <input type="number" name="precio" id="precio" required>
            </div>

            <div class="campo">
                <label for="duracion">Time dear</label>
                <input type="time" name="duracion" id="duracion" required>
            </div>

            <div class="campo">
                <label for="descripcion">Description</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" required></textarea>
            </div>

        </fieldset>
        <input type="submit" value="Add" class="add" name="enviar">
    </form>
</body>

</html>

<?php

if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $duracion = $_POST["duracion"];
    $descripcion = $_POST["descripcion"];
    try {
        $user = "root";
        $password = "Pokemon26!";
        $dataName = "mysql:host=localhost;dbname=easytravelst2122";

        $conexion_bbd = new PDO($dataName, $user, $password); //creamos la conexion
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
        $comprobacion = $conexion_bbd->prepare( "SELECT * FROM easytravelst2122.actividades WHERE nombre = :nombre");  //preparem la consulta
        $comprobacion->bindValue(":nombre",$nombre); 
        $comprobacion->execute(); 
        $comprobacion = $comprobacion->fetchAll(PDO::FETCH_ASSOC); //obtenim els resultats com un array assoc

        if (empty($comprobacion)) {
            $insert_query = "INSERT INTO easytravelst2122.actividades(nombre,descripcion,precio,duracionEstimada)VALUES('$nombre','$descripcion','$precio','$duracion')";
            $resultado = $conexion_bbd->query($insert_query);
            if ($resultado) {
                echo "<br>";
                echo "ACTIVIDAD REGISTRADA";
            }
        } else {
            echo "LA ACTIVIDAD YA EXISTE";
        }
    }


?>