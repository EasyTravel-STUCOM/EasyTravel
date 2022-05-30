<?php
session_start();
// Es un AJAX generico que sirve para ver si está logeado, si está logeado desaparecerá el div que contiene para iniciar sesión y registarse.
if(isset($_SESSION['userToAdd']['id'])){
    $user['user']['loged'] = true;
}else{
    $user['user']['loged'] = false;
}
echo json_encode($user['user']);
?>