<?php 
    include("php/pdo.php");


    $usuario = $PDO->prepare("SELECT * FROM usuario WHERE idUsuario = :getId");
    $usuario->bindValue(":getId", $_GET['id']);
    $usuario->execute(); 
    $usuarios = $usuario-> fetchAll(PDO::FETCH_ASSOC); 

    if(isset($_POST['cacelButton'])){
        header("Location: adminView.php"); 
    }
    if(isset($_POST['ModifyButton'])){
        $id = $_GET['id']; 

        $nombre = $_POST['name']; 
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $fechaDeNacimiento = $_POST['fechaDeNacimiento'];
        $telefono = $_POST['telefono'];
        $mail = $_POST['email'];
        $nombreUsuario = $_POST['nombreUsuario'];
        $rol = $_POST['rol'];
        $modify = $PDO->prepare("UPDATE usuario  SET nombre = :nombre, apellido1 = :apellido1, apellido2 = :apellido2, 
        fechaDeNacimiento = :fechaDeNacimiento, telefono = :telefono, mail = :mail, nombreUsuario = :nombreUsuario, rol = :rol WHERE idUsuario = :id" ); 
        $modify->execute(array(
            ":id" => $id, 
            ":nombre" =>$nombre, 
            ":apellido1" => $apellido1 , 
            ":apellido2" => $apellido2, 
            ":fechaDeNacimiento"=>$fechaDeNacimiento , 
            ":telefono"=> $telefono, 
            ":mail"=> $mail, 
            ":nombreUsuario"=>$nombreUsuario, 
            ":rol"=>$rol 

        ));
        header("Refresh:0");
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
    <form method='POST' >
        <label>id: <?php echo $usuarios[0]['idUsuario'] ?> </label>
        <br>
        <label>nombre: </label>
        <input type="text" name="name" value= <?php echo $usuarios[0]['nombre'] ?> id="name">  
        <br> 
        <label>apellido 1: </label>
        <input type="text" name="apellido1" id="apellido1" value= <?php echo $usuarios[0]['apellido1'] ?> >
        <br>
        <label>apellido 2: </label> 
        <input type="text" name="apellido2" id="apellido2" value = <?php echo $usuarios[0]['apellido2']?> >
        <br>
        <label>fecha de nacimiento: </label>
        <input type="date" name="fechaDeNacimiento" id="fechaDeNacimiento" value= <?php echo $usuarios[0]["fechaDeNacimiento"] ?> >
        <br>
        <label>telefono: </label>
        <input type="number" name="telefono" id="telefono" value= <?php echo $usuarios[0]['telefono'] ?> >
        <br>
        <label>mail: </label>
        <input type="email" name="email" id="email" value= <?php echo $usuarios[0]['mail']?> >
        <br> 
        <label>Nombre de usuario: </label>
        <input type="text" name="nombreUsuario" id="nombreUsuario" value= <?php echo $usuarios[0]['nombreUsuario'] ?> >
        <br>
        <label>Rol: </label>
        <input type="text" name="rol" id="rol" value= <?php echo $usuarios[0]['rol'] ?> >
        <br>
        <br>
        <input type="submit" value="Cancel" name='cancelButton'>
        <input type="submit" value="Modify" name='ModifyButton'>
    </form> 
</body>
</html>