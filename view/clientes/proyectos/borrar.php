
<?php 

include("../../../model/function.php");
$id = $_GET['id'];


delete('casos','idcaso',$id);


echo "<script> 

window.location.replace('editar.php'); 

</script>" ;



?>