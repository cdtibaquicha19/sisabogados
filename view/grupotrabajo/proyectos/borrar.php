
<?php

include("../../../model/function.php");
$id = $_GET['id'];

delete('casos', 'idcaso', $id);


echo "<script> 

window.location.replace('index.php'); 

</script>";

?>