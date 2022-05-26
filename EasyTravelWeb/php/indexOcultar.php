<?php
session_start();
if(isset($_SESSION['userToAdd'])){
    $user['user']['loged'] = true;
}else{
    $user['user']['loged'] = false;
}
echo json_encode($user['user']);
?>