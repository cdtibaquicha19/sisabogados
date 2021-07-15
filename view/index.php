<?php
  session_start();
  if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 4){
    header('location: ../../index.php');
  }
?>
