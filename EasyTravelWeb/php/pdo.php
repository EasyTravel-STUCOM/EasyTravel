<?php
try {
    $user = "adminuser";
    $password = "admin123";
    $dbName = "mysql:host=localhost;dbname=EasyTravelst2122";
    $PDO = new PDO($dbName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>