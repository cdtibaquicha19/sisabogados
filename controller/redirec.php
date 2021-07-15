<?php

  session_start();

  if($_SESSION['tipo'] == 1){
    header('location: ../view/administrador/index.php');
  }else if($_SESSION['tipo'] == 2){
    header('location: ../view/grupotrabajo/index.php');
  }

 ?>
