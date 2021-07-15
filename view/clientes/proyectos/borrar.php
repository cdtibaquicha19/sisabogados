
<?php 

include("../../../model/function.php");
$id = $_GET['id'];


delete('proyectos','id',$id);


echo "<script> 

window.location.replace('index.php'); 

</script>" ;



?>