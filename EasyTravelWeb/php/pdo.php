<?php
try {
    $user = "root";
    $password = "";
    $dbName = "mysql:host=localhost;dbname=EasyTravel";
    $PDO = new PDO($dbName, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>