<?php include("../../../model/function.php");
$id = $_GET['id'];
if(delete('departamentos','id_departamento',$id)){
	header("Location: index.php");
}else{
    	header("Location: index.php");
}

?>