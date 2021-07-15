<?php include("../../../model/function.php");
$id = $_GET['id'];
if(delete('usuarios','idusuario',$id)){
	header("Location: index.php");
}else{
    	header("Location: index.php");
}

?>