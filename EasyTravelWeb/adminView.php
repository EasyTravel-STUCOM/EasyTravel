<?php 
    include("php/pdo.php");


    $logInTry = $dbh->prepare("SELECT * FROM usuario;");
    $logInTry->execute(); 
    $usuarios = $logInTry-> fetchAll(PDO::FETCH_ASSOC); 

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
    <h3>Lista de Usuarios: </h3>
    <table>
            <tr>
                <th>id</th>
                <th>Nombres</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Fecha de nacimiento</th>
                <th>Numero de telefono</th>
                <th>Mail</th>
                <th>Nombre de Usuario</th>
                <th>Rol</th></th> 
                <?php

                        foreach( $usuarios as $clave => $row){
                        $id = $row['idUsuario']; 
                        echo"<tr>";
                            echo"<td>".$row['idUsuario']."</td>";
                            echo"<td>".$row['nombre']."</td>";
                            echo"<td>".$row['apellido1']."</td>";
                            echo"<td>".$row['apellido2']."</td>";
                            echo"<td>".$row['fechaDeNacimiento']."</td>";
                            echo"<td>".$row['telefono']."</td>";
                            echo"<td>".$row['mail']."</td>";
                            echo"<td>".$row['nombreUsuario']."</td>";
                            echo"<td>".$row['rol']."</td>";
                            echo"<td><a href='editUser.php?id=$id'>Editar</a></td>";
                            echo"<td><a href='removeUser.php?id=$id'>Eliminar</a></td>";
                        echo"</tr>";
                        }

                    ?>

            <tr>
        </table>
</body>
</html>