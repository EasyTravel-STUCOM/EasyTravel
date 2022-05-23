<?php
try {
    $user = "adminuser";
    $password = "admin123";
    $dataName = "mysql:host=localhost; port = 3306; dbname=easytravelst2122";
    $dbh = new PDO($dataName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['logIn'])){
    $username = $_POST['username']; 
    $pwd = $_POST['pwd']; 
    $logInTry = $dbh->prepare("SELECT * FROM usuario WHERE nombreUsuario = :username");
    $logInTry->bindValue(":username", $username); 
    $logInTry->execute(); 
    $exist= $logInTry->fetchAll(PDO::FETCH_ASSOC);
  
    if(!empty($exist)){
        if(password_verify($pwd,$exist[0]['userPassword']) && $exist[0]['rol']=="admin"){
            header('Location: adminView.php');
        }
        if($exist[0]['rol']!="admin"){
            echo "<h1>Este usuario no es administrador</h1>";
        }
        if(!password_verify($pwd,$exist[0]['userPassword'])){
            echo "<h3>Usuario o contraseña incorrectos</h3>";
        }
    }else{
        echo "<h1>Usuario o contraseña incorrectos </h1>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminView.css">
    <title>Document</title>
</head>

<body>
    <form METHOD='POST'>
        <label>Inserta tu nombre de usuario</label>
        <input type="text" name="username" id="username">
        <br>
        <label>Inserta tu contraseña</label>
        <br>
        <input type="password" name="pwd" id="pwd">
        <br>
        <input type="submit" name='logIn'value="Entrar">
    </form>
</body>

</html>