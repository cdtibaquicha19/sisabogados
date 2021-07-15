
<?php 

include("../../../model/function.php");
$id = $_GET['id'];


delete('archivos','id',$id);


$refer = $_SERVER['HTTP_REFERER'];


echo "<script> 
window.location.replace('".$refer."'); 
</script>
"




?>