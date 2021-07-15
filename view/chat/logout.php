<?php 
session_start();
include ('Chat.php');
$chat = new Chat();
$chat->updateUserOnline($_SESSION['idusuario'], 0);
$_SESSION['usuario'] = "";
$_SESSION['idusuario']  = "";
$_SESSION['login_details_id']= "";
header("Location:index.php");
?>






