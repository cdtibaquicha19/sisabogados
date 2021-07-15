<?php


session_start();
  if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1){
    header('location: ../../../index.php');
  }

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$creado = $_SESSION['correo'];

	$sql = "INSERT INTO proyectos(nombre, inicio, fin ,color,creado_por) values ('$title', '$start', '$end', '$color','$creado')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}





$para      = 'cdtibaquicha19@gmail.com';
$titulo    = 'Sistema dpocolombia.org ';
$mensaje   = 'se ha creado un nuevo proyecto  '.$title ;
$cabeceras = 'From: info@dpocolombia.org' . "\r\n" .
    'Reply-To: disenoweb@mandragoraproducciones.com.co' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
